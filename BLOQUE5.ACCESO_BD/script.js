
function elimination() {
let confirmar = confirm("Are you sure that do you want to delete the student?"); 
if(confirmar)
{
    alert("Student deleted");
    console.log("hola");
} else {
    alert ("No student deleted.");
    console.log("adios");
} 
return confirmar;
};
