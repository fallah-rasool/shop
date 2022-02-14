
$(function(){
$('#selectAll').click(function(){
if($(this).prop('checked')){
$('.checked').prop('checked',true);
}
});
$('#disbaleAll').click(function(){
if($(this).prop('checked')){
$('.checked').prop('checked',false);
}
});
});
