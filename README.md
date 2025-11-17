# Documentação da API de Integração de Leads - Chaves na Mão

> Documentação completa para integração de webhooks de leads de veículos e imóveis.

## 🚀 Início Rápido

### Instalação

```bash
# Instalar dependências
npm install

# Iniciar servidor de desenvolvimento
npm run docs:dev

# Build para produção
npm run docs:build

# Preview do build
npm run docs:preview
```

A documentação estará disponível em `http://localhost:5173`

## 📚 Conteúdo da Documentação

### Guia

- **Introdução**: Visão geral da API de integração
- **Começando**: Primeiros passos e configuração
- **Fluxo de Integração**: Entenda como funciona o processo completo

### API Reference

- **Autenticação**: Como funciona o Basic Auth
- **Webhook - Veículos**: Estrutura de dados para leads de veículos
- **Webhook - Imóveis**: Estrutura de dados para leads de imóveis
- **Tratamento de Erros**: Códigos de status e boas práticas

### Exemplos de Código

Implementações completas em:
- **PHP**: Vanilla e Laravel
- **Node.js**: Express e Fastify
- **Python**: Flask e FastAPI
- **C#**: ASP.NET Core

### Recursos

- **FAQ**: Perguntas frequentes
- **Changelog**: Histórico de versões
- **Suporte**: Canais de atendimento

## 🛠️ Estrutura do Projeto

```
DocIntegraçãoDeLeads/
├── docs/
│   ├── .vitepress/
│   │   └── config.js          # Configuração do VitePress
│   ├── api/
│   │   ├── autenticacao.md    # Documentação de autenticação
│   │   ├── veiculos.md        # API de veículos
│   │   ├── imoveis.md         # API de imóveis
│   │   └── erros.md           # Tratamento de erros
│   ├── exemplos/
│   │   ├── php.md             # Exemplos em PHP
│   │   ├── nodejs.md          # Exemplos em Node.js
│   │   ├── python.md          # Exemplos em Python
│   │   └── csharp.md          # Exemplos em C#
│   ├── guide/
│   │   ├── introducao.md      # Introdução
│   │   ├── comecando.md       # Começando
│   │   └── fluxo.md           # Fluxo de integração
│   ├── recursos/
│   │   ├── faq.md             # FAQ
│   │   ├── changelog.md       # Changelog
│   │   └── suporte.md         # Suporte
│   └── index.md               # Página inicial
├── leads.php                  # Arquivo de referência
├── package.json
└── README.md
```

## 📖 Tecnologias Utilizadas

- **[VitePress](https://vitepress.dev/)**: Framework de documentação
- **[Vue 3](https://vuejs.org/)**: Framework JavaScript
- **[Markdown](https://www.markdownguide.org/)**: Formatação de conteúdo

## 🎨 Personalização

### Temas

Edite `.vitepress/config.js` para personalizar:
- Logo
- Cores
- Navegação
- Sidebar
- Footer

### Adicionar Páginas

1. Crie um arquivo `.md` na pasta apropriada
2. Adicione ao sidebar em `.vitepress/config.js`
3. Escreva o conteúdo em Markdown

## 🚀 Deploy

### GitHub Pages

```bash
# Build
npm run docs:build

# Os arquivos estarão em docs/.vitepress/dist
```

### Netlify

1. Conecte seu repositório
2. Configure:
   - Build command: `npm run docs:build`
   - Publish directory: `docs/.vitepress/dist`

### Vercel

```bash
# Instale Vercel CLI
npm i -g vercel

# Deploy
vercel --prod
```

## 📝 Contribuindo

Para contribuir com a documentação:

1. Fork este repositório
2. Crie uma branch: `git checkout -b feature/nova-secao`
3. Faça suas alterações
4. Commit: `git commit -m 'Adiciona nova seção sobre X'`
5. Push: `git push origin feature/nova-secao`
6. Abra um Pull Request

## 📄 Licença

© 2025 Chaves na Mão. Todos os direitos reservados.

## 📞 Suporte

- **Email**: suporte.api@chavesnamao.com.br
- **Documentação Online**: https://docs.chavesnamao.com.br
- **Status da API**: https://status.chavesnamao.com.br

---

Desenvolvido com ❤️ pela equipe Chaves na Mão
