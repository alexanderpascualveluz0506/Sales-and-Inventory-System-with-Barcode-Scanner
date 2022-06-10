$(document).ready(function() {
  var $selectAll = $('#maincheckbox'); // main checkbox inside table thead
  var $table = $('#bootstrap-data-table-export'); // table selector 
  var $tdCheckbox = $table.find('tbody input:checkbox'); // checboxes inside table body
  var tdCheckboxChecked = 0; // checked checboxes

  // Select or deselect all checkboxes depending on main checkbox change
  $selectAll.on('click', function () {
    $tdCheckbox.prop('checked', this.checked);
  });

  // Toggle main checkbox state to checked when all checkboxes inside tbody tag is checked
  $tdCheckbox.on('change', function(e){
    tdCheckboxChecked = $table.find('tbody input:checkbox:checked').length; // Get count of checkboxes that is checked
    // if all checkboxes are checked, then set property of main checkbox to "true", else set to "false"
    $selectAll.prop('checked', (tdCheckboxChecked === $tdCheckbox.length));
  });
   $("#maincheckbox").click(function(e){
        

   });
});

