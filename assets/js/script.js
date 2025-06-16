function search_anime(){
    var search_value = $("#search_anime").val();
    window.location = `/search.php?search=${search_value}`;
}