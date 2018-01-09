import DS from 'ember-data';

export default DS.Model.extend({
    nome: DS.attr('string'),
    telefone: DS.attr('string'),
    email: DS.attr('string'),
    endereco: DS.attr('string'),
    descricao: DS.attr('string'),
    imagem: DS.attr('string'),
	vendas: DS.hasMany('venda')
});
