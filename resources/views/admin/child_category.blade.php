@if (count($child_category->categories) > 1)
  <li><a href="#">{{ $child_category->name }}</a>
    <ul class="submenu">
      @foreach ($child_category->categories as $childCategory)
        @include('admin.child_category', ['child_category' => $childCategory])
      @endforeach
    </ul>
  </li>
@else
  <li><a href="#">{{ $child_category->name }}</a></li>
@endif
