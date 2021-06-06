function checkSubmit(){
    var id = $('#id').val();
    var pw = $('#pw').val();
 
    if(id == ''){
        alert('아이디를 입력해 주세요.');
        return false;
    }
    if(pw == ''){
        alert('비밀번호를 입력해 주세요.');
        return false;
    }
    return true;
 
}