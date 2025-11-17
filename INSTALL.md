# Guia de Instalação e Execução

Este guia irá ajudá-lo a configurar e executar a documentação localmente.

## Pré-requisitos

- Node.js 18+ instalado
- npm ou yarn

## Passo a Passo

### 1. Instalar Dependências

```bash
npm install
```

ou com yarn:

```bash
yarn install
```

### 2. Executar em Modo de Desenvolvimento

```bash
npm run docs:dev
```

A documentação estará disponível em: `http://localhost:5173`

O servidor irá recarregar automaticamente quando você editar os arquivos.

### 3. Build para Produção

```bash
npm run docs:build
```

Os arquivos compilados estarão em: `docs/.vitepress/dist`

### 4. Preview do Build de Produção

```bash
npm run docs:preview
```

Isso irá servir o build de produção localmente para testes.

## Estrutura de Arquivos

```
docs/
├── .vitepress/
│   └── config.js           # Configuração do VitePress
├── api/                     # Documentação da API
│   ├── autenticacao.md
│   ├── veiculos.md
│   ├── imoveis.md
│   └── erros.md
├── exemplos/                # Exemplos de código
│   ├── php.md
│   ├── nodejs.md
│   ├── python.md
│   └── csharp.md
├── guide/                   # Guias
│   ├── introducao.md
│   ├── comecando.md
│   └── fluxo.md
├── recursos/                # Recursos adicionais
│   ├── faq.md
│   ├── changelog.md
│   └── suporte.md
└── index.md                 # Página inicial
```

## Editando a Documentação

### Adicionar Nova Página

1. Crie um arquivo `.md` na pasta apropriada
2. Adicione a referência no sidebar em `docs/.vitepress/config.js`:

```javascript
sidebar: [
  {
    text: 'Sua Seção',
    items: [
      { text: 'Nova Página', link: '/caminho/nova-pagina' }
    ]
  }
]
```

### Formato Markdown

Use markdown padrão com recursos do VitePress:

```markdown
# Título Principal

## Subtítulo

Texto normal com **negrito** e *itálico*.

### Blocos de Código

```javascript
const exemplo = 'código';
```

### Avisos

::: tip Dica
Conteúdo da dica
:::

::: warning Atenção
Conteúdo do aviso
:::

::: danger Perigo
Conteúdo de perigo
:::
```

## Deploy

### Netlify

1. Conecte seu repositório no Netlify
2. Configure:
   - **Build command**: `npm run docs:build`
   - **Publish directory**: `docs/.vitepress/dist`
   - **Node version**: 18

### Vercel

1. Importe seu repositório
2. Configure:
   - **Framework Preset**: VitePress
   - **Build Command**: `npm run docs:build`
   - **Output Directory**: `docs/.vitepress/dist`

### GitHub Pages

```bash
# Build
npm run docs:build

# Copie os arquivos de docs/.vitepress/dist para seu repositório gh-pages
```

## Solução de Problemas

### Erro ao instalar dependências

```bash
# Limpe o cache do npm
npm cache clean --force

# Delete node_modules e reinstale
rm -rf node_modules package-lock.json
npm install
```

### Porta já em uso

Se a porta 5173 estiver em uso:

```bash
# Use outra porta
npm run docs:dev -- --port 3000
```

### Build falha

Verifique:
1. Node.js versão 18 ou superior
2. Sem erros de sintaxe nos arquivos .md
3. Todas as referências de links estão corretas

## Recursos Adicionais

- [Documentação VitePress](https://vitepress.dev/)
- [Guia Markdown](https://www.markdownguide.org/)
- [Vue 3 Documentation](https://vuejs.org/)

## Precisa de Ajuda?

- Consulte o [README.md](./README.md)
- Entre em contato: suporte.api@chavesnamao.com.br
