---
layout: home

hero:
  name: "API de Integração de Leads"
  text: "Chaves na Mão"
  tagline: Receba leads de veículos e imóveis em tempo real através de webhooks
  actions:
    - theme: brand
      text: Começar
      link: /guide/introducao
    - theme: alt
      text: Ver API Reference
      link: /api/autenticacao

features:
  - icon: 🚗
    title: Leads de Veículos
    details: Receba propostas e contatos de interessados em veículos com informações completas do anúncio e cliente.
  
  - icon: 🏠
    title: Leads de Imóveis
    details: Integre leads de imóveis com dados detalhados sobre o tipo, finalidade e referência do imóvel.
  
  - icon: 🔒
    title: Autenticação Segura
    details: Sistema de autenticação Basic Auth com token e email do cliente para garantir a segurança dos dados.
  
  - icon: ⚡
    title: Webhook em Tempo Real
    details: Receba os leads instantaneamente através de requisições POST HTTP em sua URL de webhook.
  
  - icon: 📊
    title: Dados Estruturados
    details: JSON completo com informações do lead, anúncio e cliente de forma padronizada.
  
  - icon: 🛠️
    title: Fácil Integração
    details: Exemplos práticos em PHP, Node.js, Python e C# para facilitar sua implementação.
---

## Início Rápido

### 1. Configure seu Webhook

Forneça uma URL que receberá as requisições POST com os dados dos leads:

```
https://seu-dominio.com/webhook/leads
```

### 2. Implemente o Endpoint

Crie um endpoint que receba requisições POST e valide a autenticação:

```php
<?php
// Captura os headers de autenticação
$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$authToken = str_replace('Basic ', '', $authHeader);
$credentials = base64_decode($authToken);
list($email, $token) = explode(':', $credentials);

// Valide o token
if (!validarToken($email, $token)) {
    http_response_code(401);
    exit('Não autorizado');
}

// Processa o lead
$leadData = json_decode(file_get_contents('php://input'), true);
processarLead($leadData);
```

### 3. Processe os Leads

Os dados chegam em formato JSON com todas as informações necessárias:

```json
{
  "id": "12345",
  "name": "João Silva",
  "email": "joao@email.com",
  "phone": "11999999999",
  "message": "Tenho interesse no veículo",
  "segment": "VEHICLE",
  "ad": {
    "id": "67890",
    "title": "Honda Civic 2020",
    "brand": "Honda",
    "model": "Civic"
  }
}
```

## Próximos Passos

<div class="vp-doc">
  <div class="tip custom-block">
    <p class="custom-block-title">📖 Leia a Documentação</p>
    <p>Confira o <a href="/guide/introducao">Guia de Introdução</a> para entender melhor o funcionamento da integração.</p>
  </div>

  <div class="warning custom-block">
    <p class="custom-block-title">🔐 Configure a Autenticação</p>
    <p>Entenda como funciona a <a href="/api/autenticacao">Autenticação Basic Auth</a> da API.</p>
  </div>
</div>

## Outras Integrações

Confira também nossas outras documentações de integração:

- 🏠 **[Documentação XML de Imóveis](https://tecnologiacnm.github.io/cnm-xml-documentation/)** - Integre seu sistema via XML para anúncios de imóveis
- 🚗 **[API de Veículos](https://tecnologiacnm.github.io/cnm-vehicle-api-documentation/)** - Integração completa via API REST para gestão de veículos
