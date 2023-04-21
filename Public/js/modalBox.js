/** 
 *  JS script pour modal box: 
 * 
 *  1) to validate the update of one CATEGORY:  BACK
 *  2) to validate the update of one SPECIES:   BACK
 *  3) to validate the delete of a message:  BACK
 *  4) to validate the delete of a category: BACK
 *  5) to validate the delete of a species: BACK
 *  6) to validate the delete of an account: FRONT
 * 
 */

$(document).ready(function () {

  // 1) update a category
  
  $('#confirmCategoryUpdate').on('click', function (e) {
    $('#modalCategoryUpdate').modal('show');
  });

  // 2) update a species

  $('#confirmSpeciesUpdate').on('click', function (e) {
    $('#modalSpeciesUpdate').modal('show');
  });

  // 3) delete a message

  $('.confirmMsgDelete').on('click', function (e) {
    let idContact = $(this).attr('data-id');
    $('#modalMsgDelete-' + idContact).modal('show');
  });

  // 4) delete a category

  $('.confirmCategoryDelete').on('click', function (e) {
    let idCategory = $(this).attr('data-id');
    $('#modalCategoryDelete-' + idCategory).modal('show');
  });

    // 5) delete a species

  $('.confirmSpeciesDelete').on('click', function (e) {
    let idSpecies = $(this).attr('data-id');
    $('#modalSpeciesDelete-' + idSpecies).modal('show');
  });

  // 6) delete an account

  $('.confirmAccountDelete').on('click', function (e) {
    let pseudo = $(this).attr('data-id');
    console.log(pseudo);
    $('#modalAccountDelete-' + pseudo).modal('show');
  });

});
