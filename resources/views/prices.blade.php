@extends('layouts.pages')
<title>ფასები გვერი</title>

@section('content')


<section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>ფასების გვერდი  </h1>

            <textarea class="form-control" name="Text" id="" cols="30" rows="10">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis tempore officiis sed aliquam, enim provident sit natus tempora quibusdam dignissimos odit, at consequuntur fugiat asperiores! Sed nemo facere fuga sapiente!
            Odio deserunt deleniti, ipsam, cupiditate at perferendis optio magnam quod voluptatibus, ex impedit vitae. Sed modi ex temporibus eaque in ipsam necessitatibus fugit eum, corrupti amet nostrum obcaecati tempora vel.
            Tenetur obcaecati sequi distinctio maxime neque. Voluptatibus est aliquid iusto nihil saepe maxime facere sunt dicta quod obcaecati, quis soluta quo tempora exercitationem corrupti esse vitae porro molestiae adipisci veritatis.</textarea>
            <h2> აქ ფასებია </h2>
                
            <p>{{$phone}}</p>
            <p>{{$email}}</p>

        </div>
    </div>
</div>  
</section>

@endsection