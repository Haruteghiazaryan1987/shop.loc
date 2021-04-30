@if ($categories)
  <section class="content">
    <div id="jquery-accordion-menu" class="jquery-accordion-menu">
      {{-- <div class="jquery-accordion-menu-header">Categories </div> --}}
      <ul>
        @foreach ($categories as $category)
          @if (count($category->childrenCategories)>1)
            <li class="active"><a href="#">{{ $category->name }}</a>

              <ul class="submenu">
                @foreach ($category->childrenCategories as $childCategory)
                  @include('admin.child_category', ['child_category' => $childCategory])
                @endforeach
              </ul>
            </li>
            
          @else
          <li class="active"><a href="#">{{ $category->name }}</a></li>
          @endif
        @endforeach
      </ul>
    </div>
  </section>
@endif

