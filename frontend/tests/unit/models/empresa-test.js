import { moduleForModel, test } from 'ember-qunit';

moduleForModel('empresa', 'Unit | Model | empresa', {
  // Specify the other units that are required for this test.
  needs: ['model:venda']
});

test('it exists', function(assert) {
  var model = this.subject();
  // var store = this.store();
  assert.ok(!!model);
});
