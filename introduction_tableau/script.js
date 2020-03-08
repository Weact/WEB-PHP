function get_url_args() {
	let url = location; //récupère l'URL de la page
  	let params = new URLSearchParams(url.search.slice(1)); //récupère le contenu de l'url après le '?' (inclus) et le sépare

  	var array_url_params = [];

  	var genre = params.get('select_genre_musical');

  	array_url_params.push(genre)
  	if(genre != "null"){
  		var p = document.getElementById('changeselectgenre').innerHTML = params.get('select_genre_musical');
  		//alert(params.get('select_genre_musical'));
  	}else{
  		alert('An element of the array is null');
  	}
}
