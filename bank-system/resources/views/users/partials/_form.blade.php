<label for="name">Name:</label>
<input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>

<label for="email">Email:</label>
<input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>

<label for="password">Password:</label>
<input type="password" name="password" id="password" required>
