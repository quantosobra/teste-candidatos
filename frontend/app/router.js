import EmberRouter from '@ember/routing/router';
import config from './config/environment';

// As rotas definem como será a navegação dentro da aplicação desenvolvida com
// o Ember, salvando vários estados da aplicação. Os estados são representados
// como URLs e representam o que o usuário está vendo ou fazendo no momento.
//
// O Ember pode utilizar APIs do HTML5 para salvar os estados de navegação,
// alterando a URL acessada e salvando o histórico de navegação automaticamente.
// Essa é a configuração padrão de projetos criados com o ember-cli. Outras
// opções seriam usar o hash (#) na URL para separar o endereço do servidor e
// os estados do Ember, ou não modificar a URL no navegador, mantendo os estados
// internamente.
//
// Todos os estados da aplicação DEVEM ter uma rota associada. Por exemplo, uma
// lista de usuários pode ser a rota 'usuarios'. A criação de um usuário é um
// estado diferente, então seria a rota 'usuarios.novo'. A edição de um usuário
// existente, mesmo que utilize o mesmo formulário de criação de usuários, é um
// estado diferente, portanto deve ser uma rota diferente, como 'usuarios.editar'.
// Ao excluir um usuário e ser exibida uma janela de confirmação, isso é outro
// estado que pode ser definido com a rota 'usuarios.excluir'.
//
// Existem duas configurações que precisam ser feitas para uma rota. A primeira
// delas é configurar o mapeamento da rota no Ember, que é definir um nome para
// a rota e qual a URL associada. Por padrão, as URLs são geradas com o mesmo
// nome das rotas, então, por exemplo, a rota 'usuarios' resulta no endereço
// /usuarios e a rota 'usuarios.novo' resulta no endereço /usuarios/novo. Outra
// configuração, opcional, é implementar o handler da rota, para carregar dados
// e definir qual template será exibido.
//
// As URLs das rotas podem ter componentes dinâmicos para diferenciar dois estados
// semelhantes, onde a única diferença é um parâmetro. Por exemplo, o estado de
// edição de usuários é diferente para cada usuário que estiver sendo editado.
// Então a rota 'usuarios.editar' precisa ser mapeada para um endereço como
// '/usuarios/editar/:id', onde ':id' é o componente dinâmico da URL. O valor do
// parâmetro ':id' será passado para o handler da rota, que pode utilizar esse
// valor para buscar dados diferentes para serem exibidos no template.
//
// API do Router: https://emberjs.com/api/ember/2.18/classes/Router
// Guia sobre rotas: https://guides.emberjs.com/v2.18.0/routing/

// Cria a classe Router da aplicação estendendo da classe do Ember
// Passa a configuração de tipo de localização utilizada conforme definido no
// arquivo de configuração criado pelo ember-cli.
const Router = EmberRouter.extend({
    location: config.locationType,
    rootURL: config.rootURL
});

// Realiza o mapeamento de todas as rotas da aplicação
Router.map(function () {
    this.route('empresas', {}, function () {
        this.route('nova', {});
        this.route('editar', { path: '/editar/:id' });
        this.route('excluir', { path: '/excluir/:id' });
    });
    this.route('clientes', {}, function () {
        this.route('novo', {});
        this.route('editar', { path: '/editar/:id' });
        this.route('excluir', { path: '/excluir/:id' });
    });
    this.route('vendas', {}, function () {
        this.route('nova', {});
        this.route('editar', { path: '/editar/:id' });
        this.route('excluir', { path: '/excluir/:id' });
    });
});

export default Router;
