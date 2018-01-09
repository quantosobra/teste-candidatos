import DS from 'ember-data';

// Um adapter é a forma de configurar a comunicação entre o Ember e o servidor.
// O adapter `application` é utilizado por padrão em todas as requisições, então
// aqui é configurada a comunicação com a API REST principal feita com Symfony.
//
// Para acessar uma API REST, o Ember já possui uma classe RESTAdapter, que pode
// ser estendida (herança) e configurada com as opções específicas desse adapter.
//
// API do RESTAdapter: https://emberjs.com/api/ember-data/2.16/classes/DS.RESTAdapter
// Guia sobre o Adapters: https://guides.emberjs.com/v2.18.0/models/customizing-adapters/

// Estende a classe RESTAdapter com as configurações da API REST com o Symfony
export default DS.RESTAdapter.extend({
	host: 'http://127.0.0.1:8000',
	namespace: 'api/v1'
});
