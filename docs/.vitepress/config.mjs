import { defineConfig } from 'vitepress'

export default defineConfig({
  lang: 'pt-BR',
  title: 'Chaves na Mão - Documentação da API de Integração de Leads',
  description: 'Documentação completa da API de Integração de Leads - Chaves na Mão',
  base: '/lead-documentation/',
  head: [
    ['link', { rel: 'icon', href: 'https://cdn.chavesnamao.com.br/common/logos/favicon.ico' }],
    ['style', {}, `
      :root {
        --vp-c-brand-1: #DC2626;
        --vp-c-brand-2: #EF4444;
        --vp-c-brand-3: #F87171;
        --vp-c-brand-soft: rgba(220, 38, 38, 0.14);
      }
      .dark {
        --vp-c-brand-1: #F87171;
        --vp-c-brand-2: #EF4444;
        --vp-c-brand-3: #DC2626;
        --vp-c-brand-soft: rgba(248, 113, 113, 0.16);
      }
    `]
  ],
  
  themeConfig: {
    siteTitle: false,
    logo: {
      light: 'https://cdn.chavesnamao.com.br/common/logos/logo-admin-login-2023.png',
      dark: 'https://cdn.chavesnamao.com.br/common/logos/logo-cnm-w.png'
    },
    
    nav: [
      { text: 'Início', link: '/' },
      { text: 'Guia', link: '/guide/introducao' },
      { text: 'API Reference', link: '/api/autenticacao' }
    ],

    sidebar: [
      {
        text: 'Guia',
        items: [
          { text: 'Introdução', link: '/guide/introducao' },
          { text: 'Começando', link: '/guide/comecando' },
          { text: 'Fluxo de Integração', link: '/guide/fluxo' }
        ]
      },
      {
        text: 'API Reference',
        items: [
          { text: 'Autenticação', link: '/api/autenticacao' },
          { text: 'Webhook - Veículos', link: '/api/veiculos' },
          { text: 'Webhook - Imóveis', link: '/api/imoveis' }
        ]
      },
      {
        text: 'Recursos',
        items: [
          { text: 'FAQ', link: '/recursos/faq' },
          { text: 'Suporte', link: '/recursos/suporte' }
        ]
      }
    ],

    socialLinks: [
      { icon: 'linkedin', link: 'https://www.linkedin.com/company/chavesnamao/' },
      { icon: 'facebook', link: 'https://www.facebook.com/ChavesNaMao' },
      { icon: 'instagram', link: 'https://www.instagram.com/chavesnamao/' },
      { icon: 'youtube', link: 'https://www.youtube.com/ChavesNaMao' }
    ],

    footer: {
      message: 'Documentação da API de Integração de Leads',
      copyright: 'Copyright © 2025 Chaves na Mão'
    },

    search: {
      provider: 'local'
    }
  },

  markdown: {
    theme: 'material-theme-palenight',
    lineNumbers: true
  }
})
