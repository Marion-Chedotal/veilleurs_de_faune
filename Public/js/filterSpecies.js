/** 
 *  1) JS script for dropdown: 
 *     Aim: To choose the category and the species appeared
 * 
 *  2) Ajax FilterSpecies: 
 *  Function wich interact with addObservation 
 *  To add an observation we need to have the good category of species
 *  this function permit when choosing category, to call the DB with AJAX 
 *  and return the species in it in a dropdown list.
    
 *  links with views(front) and DB : 
 *   - id of the Select = filterSpecies  
 *   - function filterByCategory() in SpeciesController  
 */

$(document).ready(function () {

  // 1) Display species by category: 2 steps

  // a- Restore the value stored in localStorage
  let selectVal = localStorage.getItem('selectVal');
  if (selectVal) {
    $('.filterSpeciesByCategorySelect').val(selectVal);
  }

  // b- Store the value in localStorage on change and filter to display species by categories
  $('.filterSpeciesByCategorySelect').on('change', function () {
    let currentVal = $(this).val();
    localStorage.setItem('selectVal', currentVal);
    $('.filterSpeciesByCategoryForm').submit();
  });

  // 2): AJAX FILTER for addObservation

  filterSpecies.addEventListener("change", (event) => {

    // target: element wich is listened: SELECT
    let element = event.target;

    // let to find the value of the select option 
    let idCategory = element.options[element.selectedIndex].value;

    // call AJAX with jQuery
    $.ajax({
      url: "index.php?action=filterByCategory",
      type: "post",
      data: {
        idCategory: parseInt(idCategory) //iD select for the filter
      },

      //if sucess: via url  
      success: function (result) {
        // DOM modification:

        // a- drop the option 
        let options = document.querySelectorAll('#foundSpeciesByCat option');
        options.forEach(option => option.remove());

        // b-news options via AJAX and JSON response
        for (let i = 0; i < result.filteredSpecies.length; i++) {
          let dynamicOption = document.createElement("option");
          dynamicOption.text = result.filteredSpecies[i][3];
          dynamicOption.value = result.filteredSpecies[i][1];
          dynamicOption.dataset.categoryId = idCategory;
          let select = document.getElementById('foundSpeciesByCat');
          select.appendChild(dynamicOption);
        }
      },
      error: function () {
        alert("error");
      }
    });
  });

});