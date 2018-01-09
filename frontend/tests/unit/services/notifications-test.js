import { moduleFor, test } from 'ember-qunit';

moduleFor('service:notifications', 'Unit | Service | notifications', {
    // Specify the other units that are required for this test.
    // needs: ['service:foo']
});

test('adicionar uma mensagem', function(assert) {
    var service = this.subject();
    service.add('Nova notificação');
    var object = service.get('messages').findBy('message', 'Nova notificação');
    assert.ok(object, 'Mensagem foi adicionada às notificações');
});

test('adicionar uma mensagem com ícone diferente', function(assert) {
    var service = this.subject();
    service.add('ALERTA', 'bullhorn');
    var object = service.get('messages').findBy('message', 'ALERTA');
    assert.ok(object, 'Mensagem foi adicionada às notificações');
    assert.equal(object.icon, 'bullhorn', 'Mensagem possui o ícone especificado');
});

test('marcar uma mensagem como lida', function(assert) {
    var service = this.subject();
    service.add('Nova notificação');
    service.add('Nova notificação 2');
    service.read('Nova notificação');

    var message1 = service.get('messages').findBy('message', 'Nova notificação');
    var message2 = service.get('messages').findBy('message', 'Nova notificação 2');

    assert.notOk(message1, 'Notificação foi marcada como lida');
    assert.ok(message2, 'Outras notificações não foram modificadas');
});
