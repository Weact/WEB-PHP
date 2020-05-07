//alert('Welcome to WebForm website by Weact (LUDUS ACADEMIE)');
const min_age = 0;
const max_age = 99;
const u_pass = "ludus";
const const_array = [min_age, max_age, u_pass];
const currentSelectionDisplayer = document.getElementById('current_selection_displayer');
const currentSportDisplayer = document.getElementById('current_sports_displayer');

function inform_user_songGender()
{
  var i_selected = document.getElementById('song_gender_selection');
  var selected_display = "Vous avez séléctionné: ";
  for(i = 0; i < i_selected.options.length; i++){
    if(i_selected.options[i].selected){
      selected_display = selected_display.concat(i_selected.options[i].value + " ");
    }
  }
  currentSelectionDisplayer.innerHTML = selected_display;
}

function inform_user_sportSelected(name)
{
  var i_selected = document.getElementsByName(name);
  var selected_display = "Vous avez au moins une fois pratiqué: ";
  for(i = 0; i < i_selected.length; i++){
    if(i_selected[i].checked){
      selected_display = selected_display.concat(" " + i_selected[i].value);
    }
  }
  currentSportDisplayer.innerHTML = selected_display;
}

function validate_form(src)
{
  console.log("Liste des constantes");
  for(i = 0; i < const_array.length; i++)
  {
    console.log(i + ' ' + const_array[i]);
  }

  var u_username = document.getElementById('user_username').value;
  var u_password  = document.getElementById('user_password').value;
  var u_name = document.getElementById('user_name').value;
  var u_fname = document.getElementById('user_firstname').value;
  var u_birthday = document.getElementById('user_birthdate').value;
  // var u_gender = document.getElementById('user_gender').options[document.getElementById('user_gender').selectedIndex].value;
  var u_gender = get_radio_value_by_name('user_gender');
  var u_email = document.getElementById('user_email').value;
  var u_url = document.getElementById('user_url').value;
  var u_song_type = document.getElementById('song_gender_selection').options.value;
  var form_submit_ok = document.getElementById('hiddenInput').value;
  if(form_submit_ok == 1 && u_password == u_pass && check_input(u_name) && check_url(u_url) && check_input(u_fname) && ((parseInt(get_age(u_birthday),10) > 3) && (parseInt(get_age(u_birthday),10) < 100)) && check_mail(u_email) && u_gender != null)
  {
    document.getElementById('user_age').value = get_age(u_birthday);
    can_submit = true;
  }else{
    can_submit = false;
    form_submit_ok = 0;
    alert('Un de vos champs sont incorrect, veuillez verifier vos saisies.');
    if(u_password != u_pass)
    {
      document.getElementById('user_password').style.color = "red";
      document.getElementById('user_password').scrollIntoView();
      document.getElementById('user_password').focus();
    }else {
      document.getElementById('user_password').style.color = "green";
      form_submit_ok = 1;
    }
    if(!check_input(u_name))
    {
      document.getElementById('user_name').style.color = "red";
      document.getElementById('user_name').scrollIntoView();
      document.getElementById('user_name').focus();
    }else{
      document.getElementById('user_name').style.color = "green";
      form_submit_ok = 1;
    }
    if(!check_input(u_fname))
    {
      document.getElementById('user_firstname').style.color = "red";
      document.getElementById('user_firstname').scrollIntoView();
      document.getElementById('user_firstname').focus();
    }else{
      document.getElementById('user_firstname').style.color = "green";
      form_submit_ok = 1;
    }
    if(!((parseInt(get_age(u_birthday),10) > 3) && (parseInt(get_age(u_birthday),10) < 100)))
    {
      document.getElementById('user_birthdate').scrollIntoView();
      document.getElementById('user_birthdate').focus();
      document.getElementById('user_birthdate').style.color = "red";
    }else{
      document.getElementById('user_birthdate').style.color = "green";
      form_submit_ok = 1;
    }
    if(!check_mail(u_email)){
      document.getElementById('user_email').style.color = "red";
      document.getElementById('user_email').focus();
      document.getElementById('user_email').scrollIntoView();
    }else{
      document.getElementById('user_email').style.color = "green";
      form_submit_ok = 1;
    }
    if(!check_url(u_url)){
      document.getElementById('user_url').style.color = "red";
      document.getElementById('user_url').focus();
      document.getElementById('user_url').scrollIntoView();
    }else{
      document.getElementById('user_url').style.color = green;
      form_submit_ok = 1;
    }
    if(u_gender == null){
      document.get
    }
  }
    if(can_submit && form_submit_ok == 1)
      var form = document.getElementById("myForm").submit();
}

function get_radio_value_by_name(name){
  var radios = document.getElementsByName(name);
  for(i = 0; i < radios.length; i++){
    if(radios[i].checked){
      return radios[i].value;
    }
  }
  return null;
}

function check_input(input)
{
  var letters = /^[A-Za-z]+$/;
  if(input.match(letters))
  {
    return true;
  }else{
    console.log(input + "is not a valid input !");
    return false;
  }
}

function check_mail(input)
{
  var regex = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
  if(input.match(regex))
  {
    return true;
  }else{
    console.log(input + "is not a valid input!");
    return false;
  }
}

function check_url(input)
{
  var regex = /^(https?|chrome):\/\/[^\s$.?#].[^\s]*$/gm
  if(input.match(regex))
  {
    return true;
  }else{
    console.log(input + "is not a valid input!");
    return false;
  }
}

function get_age(date)
{
  const words = date.split('-');
  var dt = new Date();
  var current_year = dt.getYear() + 1900;

  var c_year_int = parseInt(current_year, 10);
  var c_bday_int = parseInt(words[0], 10);

  return c_year_int - c_bday_int;
}
