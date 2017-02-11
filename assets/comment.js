$("#alertLength").hide();
$("#alertSucc").hide();
$("#myModal").hide();

/*
 * every load to this code we chick if the local storage has a comment if yes
 * and the user is loged in we push it to the server 
 * 
 */
$(document).ready(function () {
    if(localStorage && localStorage.getItem('comment') && isLoggedInComment()){
        pushToserver(getFromLocal());
        clearLocal();
    }
});
function pushToserver(comments) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax(
            {
                url: "/comment/createajax",
                data: {
                    comments: comments,
                    _csrf: csrfToken
                },
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (result) {
                    console.log(result);
                },
                error: function (result) {
                    console.log(result);
                }
            }
    );
}

function getFromLocal() {
    return  JSON.parse(localStorage.getItem('comments'));
}

function pushToLocal(comment) {
    $("#alertLength").hide();
    alert('push to local True');
    // Retrieve the comments object from local storage
    if (localStorage && localStorage.getItem('comments')) {
        var comments = JSON.parse(localStorage.getItem('comments'));
        alert('push to storage');
        // push the new json array
        comments.push(comment);
        // add the new value to the local storage ( comments )
        localStorage.setItem('comments', JSON.stringify(comments));
    } else {
        comments = [comment];
        localStorage.setItem('comments', JSON.stringify(comments));
    }
}

var isLoggedInResult = '';
function isLoggedInComment() {
    //here we check if the user user is loggedIn or not 
    $.ajax(
            {
                url: "/cart/isloggedin",
                // i add async: false here, because in asynchronous-mode it's not 
                // guaranteed that result is saved into isLoggedInResult before 
                // isLoggedInResult is returned
                async: false,
                success: function (result) {
                    isLoggedInResult = result;
                },
                error: function () {
                    isLoggedInResult = 0;
                    alert('Error occured');
                }
            }
    );
    return isLoggedInResult;
}

function clearLocal() {
    // clear all data from the local storage ( comment )
    localStorage.removeItem('comments');
    $("#alertLength").hide();
    $("#comment-input").val(' ');
}

function add(body, auther, object, object_id) {
    var comment = {};
    comment.body = body;
    comment.auther = auther;
    comment.object = object;
    comment.object_id = object_id;
    if (isLoggedInComment()) {
        pushToLocal(comment);
        pushToserver(getFromLocal());
        $("#alertSucc").show();
        clearLocal();
    } else {
        pushToLocal(comment);
        // $("html, body").animate({scrollTop: 0}, 1000);
        $('#login-modal').modal('show');

    }
}

$('#comment-btn').click(function () {
    var commentData = $("#comment-input").val().length;
    var commenText = $("#comment-input").val();
    if (commentData < 20) {
        $("#alertLength").show();
    } else {
        $("#alertLength").hide();
        add(commenText, auther, object, globalBlogID);
    }
});

$('#btn-modal-login').click(function () {
    $('#login-modal').modal('hide');
    $("html, body").animate({scrollTop: 0}, 1000);
    $("#slid-panel").show(300);
});
