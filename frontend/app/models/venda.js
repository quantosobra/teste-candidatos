import DS from 'ember-data';

export default DS.Model.extend({
    dataCompra: DS.attr('date'),
    valor: DS.attr('number'),
    comissao: DS.attr('number'),
    cliente: DS.belongsTo('cliente'),
    empresa: DS.belongsTo('empresa')
});
