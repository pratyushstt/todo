console.log("Hello");

// $(document).keyup(function (e) {
//     if ($("#task").is(":focus") && (e.keyCode == 13)) {
//         var value = $("#task").val();
//         console.log(value);
//     }
// });

function edit(x){
    console.log(x);
    $("#name"+x).removeAttr('readonly');
    $("#name"+x).removeAttr('class');
    $("#name"+x).addClass('form-control');
}