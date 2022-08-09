<div class="container">
<input type="radio" name="dot" id="one">
<input type="radio" name="dot" id="two">
<div class="main-card">
    <div class="cards">
        @for($i = 0; $i <= 2 ; $i++)

            <a class="card" href="#"><div>
                <div class="content">
                    <div class="img">
                        <img src="{{ asset($Languages[$i]->image_url) }}"/>
                    </div>
                    <div class="details">
                        <div class="name">{{ $Languages[$i]->name }}</div>
                        <div class='description'>{{ $Languages[$i]->description }}</div>
                    </div>
                </div>
            </div></a>
        
        @endfor        
    </div>

    <div class="cards">
        @for($i = 3; $i <= 5 ; $i++)

            <a class="card" href="#"><div>
                <div class="content">
                    <div class="img">
                        <img src="{{ asset($Languages[$i]->image_url) }}"/>
                    </div>
                    <div class="details">
                        <div class="name">{{ $Languages[$i]->name }}</div>
                        <div class='description'>{{ $Languages[$i]->description }}</div>
                    </div>
                </div>
            </div></a>
        
        @endfor        
    </div>

</div>
<div class="button">
    <label for="one" class=" active one"></label>
    <label for="two" class="two"></label>
</div>
</div>

