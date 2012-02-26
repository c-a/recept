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
    
    var text = '<tr class="ingredient-' + id + '">';
      
    text += '<td><div class="span2" style="word-wrap:break-word;">' + name + '</div></td>';
    text += '<td><input type="text" name="RecipeForm[ingredient][' + id + '][amount]" class="span1" value="' + amount + '"/></td>';
    
    text += '<td><select class="span2" value="' + unit + '">';
    for (var unit in units) {
      text += '<option>' + units[unit].label + '</option>';
    }
    text += '</select></td>'

    text += '<td><input type="text" name="RecipeForm[ingredient][' + id + '][comment]" </td>';
    text += '<td class="remove-button"><i class="icon-remove"/></i></td>';
    text += '</tr>'
    
    this.$list.append(text);
    
    this._nIngredients++;
  }
}

jQuery(function($) {

  var list = new IngredientsList($('#ingredients-table'));

  $('#ingredient-modal-add').click(function() {
    list.addIngredient($('input[name="ingredient"]').val(),
          $('input[name="amount"]').val(), $('input[name="unit"]').val());
  });
});