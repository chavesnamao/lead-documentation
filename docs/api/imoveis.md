# Webhook - Imóveis

Documentação completa da estrutura de dados enviada para leads do segmento **REALTY** (imóveis).

## Visão Geral

Quando um lead de imóvel é gerado, enviamos uma requisição POST com JSON contendo todas as informações do contato, anúncio do imóvel e dados do cliente/anunciante.

## Estrutura da Requisição

### Headers

```http
POST /seu-webhook-url HTTP/1.1
Host: seu-dominio.com
Content-Type: application/json
User-Agent: chavesnamao-leads-api
Authorization: Basic Y2xpZW50ZUBleGVtcGxvLmNvbTphYmMxMjN4eXo3ODk=
```

### Body (JSON)

```json
{
  "id": "12345",
  "name": "Maria da Silva",
  "email": "maria.silva@email.com",
  "phone": "11988776655",
  "message": "Olá, tenho interesse neste imóvel. Gostaria de agendar uma visita.",
  "createdAt": "2025-11-06 14:30:00",
  "sendAt": "2025-11-06 14:30:05",
  "segment": "REALTY",
  "proposeTypeName": "Formulário WhatsApp",
  "ad": {
    "id": "98765",
    "title": "Apartamento 3 Quartos com Suíte - Jardim Paulista",
    "reference": "IMOB-2024-045",
    "realtyType": "Apartamento",
    "purpose": "Venda"
  },
  "client": {
    "name": "Imóveis Premium Ltda",
    "tradeName": "Premium Imóveis",
    "document": "98.765.432/0001-10"
  }
}
```

## Campos da Raiz

| Campo | Tipo | Obrigatório | Descrição |
|-------|------|-------------|-----------|
| `id` | string | Sim | ID único do lead na plataforma Chaves na Mão |
| `name` | string | Sim | Nome completo do interessado |
| `email` | string | Sim | Email do interessado |
| `phone` | string | Sim | Telefone do interessado (com DDD) |
| `message` | string | Não | Mensagem enviada pelo interessado |
| `createdAt` | string | Sim | Data/hora de criação do lead (formato: Y-m-d H:i:s) |
| `sendAt` | string | Sim | Data/hora de envio do webhook (formato: Y-m-d H:i:s) |
| `segment` | string | Sim | Sempre "REALTY" para imóveis |
| `proposeTypeName` | string | Sim | Tipo da proposta (ex: "Formulário WhatsApp", "Contato Site", etc) |

## Objeto `ad` (Anúncio do Imóvel)

| Campo | Tipo | Obrigatório | Descrição |
|-------|------|-------------|-----------|
| `id` | string | Sim | ID do anúncio/imóvel na plataforma |
| `title` | string | Sim | Título completo do anúncio |
| `reference` | string | Não | Código de referência do imóvel |
| `realtyType` | string | Sim | Tipo do imóvel (Apartamento, Casa, Terreno, Sala Comercial, etc) |
| `purpose` | string | Sim | Finalidade (Venda, Locação, Venda/Locação) |

## Objeto `client` (Anunciante)

| Campo | Tipo | Obrigatório | Descrição |
|-------|------|-------------|-----------|
| `name` | string | Sim | Nome ou razão social do anunciante |
| `tradeName` | string | Não | Nome fantasia (se aplicável) |
| `document` | string | Sim | CPF ou CNPJ do anunciante |

## Tipos de Imóveis

Os valores mais comuns para `realtyType`:

- **Apartamento**
- **Casa**
- **Terreno**
- **Sala Comercial**
- **Loja**
- **Galpão**
- **Prédio**
- **Chácara**
- **Fazenda**
- **Sítio**
- **Cobertura**
- **Kitnet**
- **Flat**
- **Studio**
- **Sobrado**

## Finalidades

Os valores para `purpose`:

- **Venda**: Imóvel apenas para venda
- **Locação**: Imóvel apenas para locação/aluguel
- **Venda/Locação**: Imóvel disponível para ambas opções

## Campos Opcionais (null)

Alguns campos podem vir com valor `null`:

- `message`: Quando o usuário não digitou mensagem
- `ad.reference`: Se o imóvel não tem código de referência

## Próximos Passos

- [Webhook de Veículos](/api/veiculos)

## Outras Integrações de Imóveis

Para integração completa de anúncios de imóveis via XML, consulte:

📚 **[Documentação XML de Imóveis](https://tecnologiacnm.github.io/cnm-xml-documentation/)** - Envie seus anúncios de imóveis através de arquivo XML com estrutura padronizada
