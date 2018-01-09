import { formatDate } from '../../../helpers/format-date';
import { module, test } from 'qunit';

module('Unit | Helper | format date');

test('default format', function(assert) {
    var result = formatDate(['2015-11-04']);
    assert.equal(result, '04/11/2015');
});

test('custom format', function(assert) {
    var result = formatDate(['2015-11-04'], {format: 'DD [de] MMM [de] YYYY'});
    assert.equal(result, '04 de Nov de 2015');
});
