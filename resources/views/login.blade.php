<x-layout>
    <form method="POST" action=" {{ route('login.attempt') }} ">
        @csrf
        <input type="email" placeholder="sample@email.com">
        <input type="password" placeholder="password">
        <button type="submit">Submit</button>
    </form>
</x-layout>