<div class="col-md-4">
    <div class="content"> <a href="{{ url('apartment', $apartment_premium['id']) }}">
            <div class="content-overlay"></div> <img class="content-image" src="{{ filter_var($apartment_premium->cover, FILTER_VALIDATE_URL) ?  $apartment_premium->cover : asset('storage/' . $apartment_premium->cover) }}" alt="Card image cap">
            <div class="content-details fadeIn-bottom">
                <h3 class="content-title">{{ $apartment_premium['title'] }}</h3>
                <p class="content-text"><i class="fa fas-info"></i> Clicca per maggiori informazioni</p>
            </div>
        </a> </div>
</div>
  
  
  
  
  
  
