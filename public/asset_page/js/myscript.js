function UpdateCart(qty,id){
	$.get(
		"{{asset('page/cap-nhat')}}",
		{qty:qty,id:id},
		function (){
			location.reload();
		}
	);
};