<div class="row">
        @foreach($cases as $case)
        <div class="col-md-3 ">
            <div class="service">
                <a href="{{ route('case', $case->id) }}">
                    <div class="image-container">
                        <img src="https://picsum.photos/200/300" alt="Avatar" class="image-service" style="height: 150px">
                        <div class="middle-service">
                            <div class="text-service">"{{ $case->description }}"</div>
                        </div>
                    </div>
                    <div class="footer-service">
                        <p>{{ $case->name }}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>