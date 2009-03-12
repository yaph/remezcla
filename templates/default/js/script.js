$(function(){
  var a = $('#self-req');
  var sc = $('#content');
  a.click(function(){
    sc.html('Loading...');
    $.get(
      a.attr('href'), {js: 1},
      function(data){
        sc.html(data);
      }
    );
    return false;
  });
});