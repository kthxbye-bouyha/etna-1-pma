function Pointer(x, y)
{
  this.offsetLeft = x;
  this.offsetTop = y;
}

function adjustSize()
{
  $('#graph').setAttribute("width", document.width - 1);
  $('#graph').setAttribute("height", window.innerHeight + window.scrollMaxY - 20);
}

function draw(src, dst)
{
  var my_canvas = $("#graph");
  if (my_canvas.getContext)
  {
      var srcLeft = Math.round(src.offsetLeft + (src.offsetWidth / 2)) - my_canvas.offsetLeft;
      var srcTop = Math.round(src.offsetTop + (src.offsetHeight / 2)) - my_canvas.offsetTop;
      var dstLeft = Math.round(dst.offsetLeft + (dst.offsetWidth / 2)) - my_canvas.offsetLeft;
      var dstTop = Math.round(dst.offsetTop + (dst.offsetHeight / 2)) - my_canvas.offsetTop;
      
      var ctx = my_canvas.getContext('2d');
      ctx.beginPath();
      ctx.moveTo(srcLeft,srcTop);
      ctx.lineTo(dstLeft,dstTop);
      ctx.stroke();
  }
}

function eraseRelation(src, dst)
{
  var my_canvas = document.getElementById("graph");
  if (my_canvas.getContext)
  {
      var srcLeft = Math.round(src.offsetLeft + (src.offsetWidth / 2));
      var srcTop = Math.round(src.offsetTop + (src.offsetHeight / 2));
      var dstLeft = Math.round(dst.offsetLeft + (dst.offsetWidth / 2));
      var dstTop = Math.round(dst.offsetTop + (dst.offsetHeight / 2));
      
      var ctx = my_canvas.getContext('2d');
      ctx.beginPath();
      ctx.moveTo(srcLeft,srcTop);
      ctx.lineTo(dstLeft,dstTop);
      ctx.stroke();
  }
}
window.onresize = adjustSize;
