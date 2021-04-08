function search_check(){
    if(document.search.search_var.value==""){
        alert("검색어를 입력해주세요.");
        return false;
    }
    else{
        return true;
    }
}