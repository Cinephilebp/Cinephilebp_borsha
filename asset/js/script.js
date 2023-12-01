//catalog page JS
function toggleList(category) {
var list = document.getElementById(category+'-list');
var hiddenList = document.querySelectorAll(".hidden-list");
if (list.style.display === 'none') 
{
    hiddenList.forEach(function(elem)
    {
        elem.style.display = 'none';
    })
    list.style.display = 'block';
} 
else if (list.style.display === '') 
{
    hiddenList.forEach(function(elem)
    {
        elem.style.display = 'none';
    })
    list.style.display = 'block';
} 
else {
    hiddenList.forEach(function(elem)
    {
        elem.style.display = 'none';
    })
}
}

