function IngredientsList($list)
{
  this._init($list);
}

IngredientsList.prototype = {
  _init: function($list) {
    this.$list = $list;
    this._nIngredients = 0;
    
    $('.remove-button', this.$list).live('click', function(event) {
      $(event.target).closest('tr').remove();
    });
  },
  
  addIngredient: function(name, amount, unit)
  {
    var id = ++this._nIngredients;
    
    var text = '<tr class="ingredient-' + id + '"><td>' + name + '</td>';
    text += '<td><input type="text" name="RecipeForm[ingredient][' + id + '][name] size="3" value="' + amount + '"/></td>';
    
    text += '<td><select value="' + unit + '">';
    for (var unit in units) {
      text += '<option>' + units[unit].label + '</option>';
    }
    text += '</select></td>'
    
    text += '<td class="remove-button"><img src="' + baseurl + '/images/list-remove.png" height="32" width="32" /></td>';
    text += '</tr>'
    
    this.$list.append(text);
    
    this._nIngredients++;
  }
}

jQuery(function($) {

  var list = new IngredientsList($('#ingredients-table'));
  
  $('#add-ingredient-dialog').dialog({
    autoOpen: false,
    title: "Lägg till ingrediens",
    width:  'auto',
    buttons: {
      'Lägg till': function() {
        
        list.addIngredient($('input[name="ingredient"]').val(),
          $('input[name="amount"]').val(), $('input[name="unit"]').val());
        $(this).dialog('close');
        return true;
      },
      'Avbryt': function() {
        $(this).dialog('close');
        return false;
      }
    }
  });
  
  $('#add-ingredient').click(function() {
    $('#add-ingredient-dialog').dialog('open');
  });
    
});