import { moduleForModel, test } from 'ember-qunit';

moduleForModel('venda', 'Unit | Model | venda', {
  // Specify the other units that are required for this test.
  needs: ['model:empresa', 'model:cliente']
});

test('it exists', function(assert) {
  var model = this.subject();
  // var store = this.store();
  assert.ok(!!model);
});
