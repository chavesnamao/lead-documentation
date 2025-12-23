# Autenticação

A API de Integração de Leads utiliza **HTTP Basic Authentication** para garantir a segurança no recebimento dos dados.

## Como Funciona

A autenticação é enviada no header `Authorization` de cada requisição usando o formato:

```
Authorization: Basic <base64(email:token)>
```

Este método garante o **envio seguro dos leads** e a **identificação única do cliente**. Ao receber a requisição, você (integrador) pode realizar o decode do Base64 para obter o email e o token, validando assim que os leads são provenientes da plataforma Chaves na Mão e identificando qual cliente específico está recebendo os dados.

### Componentes da Autenticação

1. **Email**: O email cadastrado na conta do cliente na plataforma Chaves na Mão
2. **Token**: Token único gerado para a conta do cliente
3. **Base64**: A codificação `email:token` em Base64

> **📋 Importante**: Caso você não tenha acesso ao email e token de autenticação, entre em contato com nossa equipe de atendimento para solicitar suas credenciais de integração.

## Próximos Passos

- [Webhook de Veículos](/api/veiculos)
- [Webhook de Imóveis](/api/imoveis)
