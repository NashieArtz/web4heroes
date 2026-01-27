<h1 >Liste des Héros</h1>
        <form >
            <div >
                <div >

                    <div >
                        <label >Genre</label>
                        <select name="genre" >
                            <option value="">Tous les genres</option>
                            <option value="action">Action</option>
                        </select>
                    </div>

                    <div>
                        <label >Héros</label>
                        <select name="hero">
                            <option value="">Tous les héros</option>
                            <option value="spiderman">Spider-Man</option>
                        </select>
                    </div>

                </div>
            </div>
        </form>
        <div>
            <?php foreach ($movies as $movie): ?>
                <div >
                    <div>

                        <img
                            src=""
                            alt="<?= htmlspecialchars($movie['title']) ?>">

                        <div >
                            <h5 >
                                <?= htmlspecialchars($movie['title']) ?>
                            </h5>
                            <p >
                                <?= htmlspecialchars($movie['year']) ?>
                            </p>
                            <span >
                                <?= htmlspecialchars($movie['hero']) ?>
                            </span>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
