# Autenticação

A API de Integração de Leads utiliza **HTTP Basic Authentication** para garantir a segurança no recebimento dos dados.

## Como Funciona

A autenticação é enviada no header `Authorization` de cada requisição usando o formato:

```
Authorization: Basic <base64(email:token)>
```

### Componentes da Autenticação

1. **Email**: O email cadastrado na conta do cliente na plataforma Chaves na Mão
2. **Token**: Token único gerado para a conta do cliente
3. **Base64**: A codificação `email:token` em Base64

## Próximos Passos

- [Webhook de Veículos](/api/veiculos)
- [Webhook de Imóveis](/api/imoveis)
