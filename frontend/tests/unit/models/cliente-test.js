import { moduleForModel, test } from 'ember-qunit';

moduleForModel('cliente', 'Unit | Model | cliente', {
  // Specify the other units that are required for this test.
  needs: ['model:venda']
});

test('it exists', function(assert) {
  var model = this.subject();
  // var store = this.store();
  assert.ok(!!model);
});
