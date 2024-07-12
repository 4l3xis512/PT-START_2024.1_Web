var count = 0;
document.getElementById("myButton").onclick = function()
{
    count++
    if (count % 2 == 0)
    {
        document.getElementById("demo").innerHTML = ""
    }
    else
    {
        var img = document.createElement("img");
        
        img.src = "https://www.dictionary.com/e/wp-content/uploads/2023/04/20230406_mouseRat_1000x700-790x310.jpg"
        document.getElementById("demo").appendChild(img);
    }

}