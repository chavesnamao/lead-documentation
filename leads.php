<?php
require_once __DIR__ . "/abstract/JSONLead.php";

class ChavesNaMaoLeads extends JSONLead
{

    private $token;
    private $clientMail;

    public function buildLeadBody()
    {
        $params = $this->getParams();
        $data = json_decode($this->getData(), 1);

        $clientData = $this->getClientData($params['clientId']);
        $adData = $this->getAdData($params['adId'], $clientData->tipo_pessoa2);

        $this->token = $clientData->token;
        $this->clientMail = $clientData->email;

        // Verifica se é imóvel ou veículo
        $isRealty = in_array($clientData->tipo_pessoa2, ['IMOB', 'CORRETOR']);

        if ($isRealty) {
            $JSON = $this->buildRealtyJSON($data, $params, $clientData, $adData);
        } else {
            $JSON = $this->buildVehicleJSON($data, $params, $clientData, $adData);
        }

        $this->setJSON(json_encode($JSON));
    }

    private function buildVehicleJSON($data, $params, $clientData, $adData)
    {
        $JSON = [
            'id' => $params['id'],
            'name' => $this->validateGenericField($data['dadosProposta']['nome'], $data['dadosProposta']['nome_proposta']),
            'email' => $this->validateGenericField($data['dadosProposta']['email'], $data['dadosProposta']['email_proposta']),
            'phone' => $this->validateGenericField($data['dadosProposta']['telefone'], $data['dadosProposta']['telefone_proposta']),
            'message' => $this->validateGenericField($data['dadosProposta']['mensagem'], $data['dadosPost']['mensagem']),
            'createdAt' => $this->validateGenericField($data['dadosProposta']['data_proposta'], date('Y-m-d H:i:s')),
            'sendAt' => $this->validateGenericField($data['dadosProposta']['data_proposta'], date('Y-m-d H:i:s')),
            'segment' => 'VEHICLE',
            'proposeTypeName' => $this->validateGenericField($data['dadosProposta']['tipo_proposta'], 'Formulário WhatsApp'),
            'ad' => [
                'id' => $params['adId'],
                'title' => $this->validateGenericField($adData->titulo, null),
                'reference' => $this->validateGenericField($adData->referencia, $data['dadosAnuncio']['referencia']),
                'brand' => $this->validateGenericField($adData->nome_marca, null),
                'model' => $this->validateGenericField($adData->nome_modelo, null),
                'trim' => $this->validateGenericField($adData->nome_versao, null),
                'color' => $this->validateGenericField($adData->cor, null),
                'fuel' => $this->validateGenericField($adData->combustivel, null),
                'manufacturedYear' => $this->validateGenericField($adData->ano_fabricacao, null),
                'modelYear' => $this->validateGenericField($adData->ano_modelo, null),
                'mileage' => $this->validateGenericField($adData->quilometragem, null),
            ],
            'client' => [
                'name' => $this->validateGenericField($clientData->nome, null),
                'tradeName' => $this->validateGenericField($clientData->nome_fantasia, null),
                'document' => $this->validateGenericField($clientData->cpfcnpj, null)
            ]
        ];

        return $JSON;
    }

    private function buildRealtyJSON($data, $params, $clientData, $adData)
    {
        $JSON = [
            'id' => $params['id'],
            'name' => $this->validateGenericField($data['dadosProposta']['nome'], $data['dadosProposta']['nome_proposta']),
            'email' => $this->validateGenericField($data['dadosProposta']['email'], $data['dadosProposta']['email_proposta']),
            'phone' => $this->validateGenericField($data['dadosProposta']['telefone'], $data['dadosProposta']['telefone_proposta']),
            'message' => $this->validateGenericField($data['dadosProposta']['mensagem'], $data['dadosPost']['mensagem']),
            'createdAt' => $this->validateGenericField($data['dadosProposta']['data_proposta'], date('Y-m-d H:i:s')),
            'sendAt' => $this->validateGenericField($data['dadosProposta']['data_proposta'], date('Y-m-d H:i:s')),
            'segment' => 'REALTY',
            'proposeTypeName' => $this->validateGenericField($data['dadosProposta']['tipo_proposta'], 'Formulário WhatsApp'),
            'ad' => [
                'id' => $params['adId'],
                'title' => $this->validateGenericField($adData->titulo, null),
                'reference' => $this->validateGenericField($adData->referencia, $data['dadosAnuncio']['referencia']),
                'realtyType' => $this->validateGenericField($adData->nome_tipo_imovel, null),
                'purpose' => $this->validateGenericField($adData->finalidade2, null)
            ],
            'client' => [
                'name' => $this->validateGenericField($clientData->nome, null),
                'tradeName' => $this->validateGenericField($clientData->nome_fantasia, null),
                'document' => $this->validateGenericField($clientData->cpfcnpj, null)
            ]
        ];

        return $JSON;
    }

    public function getClientData($clientId)
    {
        $obj = &get_instance();
        $obj->load->model("cliente_model");
        return $obj->cliente_model->getById($clientId);
    }

    public function getAdData($adId, $adType)
    {
        if (in_array($adType, ['IMOB', 'CORRETOR'])) {
            $obj = &get_instance();
            $obj->load->model("imovel_model");
            return $obj->imovel_model->getById($adId);
        } else {
            $obj = &get_instance();
            $obj->load->model("veiculo_model");
            return $obj->veiculo_model->getById($adId);
        }
    }

    public function sendLead()
    {
        $params = $this->getParams();
        // Monta a autenticação: email:token (pode ser decodado no lado do integrador)
        $authToken = base64_encode($this->clientMail . ':' . $this->token);

        $paramsSend = [
            'isJSON' => true,
            'HTTPMethod' => 'POST',
            'headers' => [
                "Content-Type" => "application/json",
                "User-Agent"    => "chavesnamao-leads-api",
                "Authorization" => "Basic " . $authToken
            ],
            'url' => $params['tokenLeads'], // URL do webhook do integrador
            'lead' => $this->getJSON()
        ];

        return parent::sendLeadInterno($paramsSend);
    }
}
