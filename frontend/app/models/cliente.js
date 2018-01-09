import DS from 'ember-data';

export default DS.Model.extend({
    nome: DS.attr('string'),
    telefone: DS.attr('string'),
    email: DS.attr('string'),
    endereco: DS.attr('string'),
	compras: DS.hasMany('venda')
});
