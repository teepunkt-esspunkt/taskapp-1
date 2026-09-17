<x-layout title="Benutzer">

    <div class="overflow-x-auto">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th>Bild</th>
        <th>Name</th>
        <th>E-Mail</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($users as $user)
      <tr>
        <td>
          <div class="flex items-center gap-3">
            <div class="avatar">
              <div class="mask h-15 w-20">
                @if($user->imagepath)
                <img
                  src="{{ $user->imagepath }}"
                  alt="{{ $user->imagealt }}" />
                @else
                <a href="{{ route('userimage.create', $user) }}">Bild Hochladen</a>
                @endif
              </div>
            </div>
        </td>
        <td>
            <div>
              <div class="font-bold">{{ $user->name }}</div>
              <div class="text-sm opacity-50">{{ $user->email }}</div>
            </div>
          </div>
        </td>
        <td>
          {{ $user->email }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
       

</x-layout>