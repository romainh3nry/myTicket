$(document).ready(function() {
    getServices();
})

function getServices() {
    $.ajax({
        url: '/api/services/',
        success : function(response) {
            response.forEach(element => {
                $('#select-services').append(
                    `<option value="${element.id}">${element.name}</option>`
                )
            })
        }
    })
}
/*
$( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } )

  */
 