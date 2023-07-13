<script>
  function validateForm() {
  let q1 = document.querySelector('input[name="q1"]:checked');
  let q2 = document.querySelector('input[name="q2"]:checked');
  let q3 = document.querySelector('input[name="q3"]:checked');

if (!q1 || !q2 || !q3){
  alert('Veuillez répondre à toutes les questions.'){
    return false
  } else{
    return true
  }
}
}





  function myFunction() {
    document.getElementById("scroll").innerHTML = "You scrolled in div.";
}
 
 
</script>
