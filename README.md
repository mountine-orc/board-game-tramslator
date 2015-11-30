# board-game-tramslator
База перекладів ігрових компонентів для настільних ігор. Базується на ZF2

Інсталяція
---------------------------

    git clone https://github.com/mountine-orc/board-game-tramslator.git

using Composer

    composer install


В папці \config\autoload\ додаємо local.php із наступним кодом:

    return array(
         'db' => array(
             'username' => 'root',
             'password' => '',
         ),
     );


Створюємо базу данних і наповняємо її:



	--
	-- База даних: `bgtranslator`
	--

	-- --------------------------------------------------------

	--
	-- Структура таблиці `category`
	--

	CREATE TABLE IF NOT EXISTS `category` (
	`id` int(11) NOT NULL,
	  `game_id` int(11) NOT NULL,
	  `name_original` varchar(100) NOT NULL,
	  `name_translated` varchar(100) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	-- --------------------------------------------------------

	--
	-- Структура таблиці `game`
	--

	CREATE TABLE IF NOT EXISTS `game` (
	`id` int(11) NOT NULL,
	  `name_original` varchar(100) NOT NULL,
	  `name_translated` varchar(100) NOT NULL
	) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

	--
	-- Дамп даних таблиці `game`
	--

	INSERT INTO `game` (`id`, `name_original`, `name_translated`) VALUES
	(1, 'The  Military  Wives', 'In  My  Dreams'),
	(2, 'Adele', '21'),
	(3, 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)'),
	(4, 'Lana  Del  Rey', 'Born  To  Die'),
	(5, 'Gotye', 'Making  Mirrors'),
	(6, 'Shum band', 'The best Hits'),
	(8, 'dfdfdf', 'eeeee');

	-- --------------------------------------------------------

	--
	-- Структура таблиці `item`
	--

	CREATE TABLE IF NOT EXISTS `item` (
	`id` int(11) NOT NULL,
	  `category_id` int(11) NOT NULL,
	  `code` varchar(10) NOT NULL,
	  `name_original` varchar(100) NOT NULL,
	  `name_translated` varchar(100) NOT NULL,
	  `text_original` varchar(100) NOT NULL,
	  `text_translated` varchar(100) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='For example Cards or text on the Map';

	--
	-- Індекси збережених таблиць
	--

	--
	-- Індекси таблиці `category`
	--
	ALTER TABLE `category`
	 ADD PRIMARY KEY (`id`), ADD KEY `game_id` (`game_id`);

	--
	-- Індекси таблиці `game`
	--
	ALTER TABLE `game`
	 ADD PRIMARY KEY (`id`);

	--
	-- Індекси таблиці `item`
	--
	ALTER TABLE `item`
	 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`);

	--
	-- AUTO_INCREMENT для збережених таблиць
	--

	--
	-- AUTO_INCREMENT для таблиці `category`
	--
	ALTER TABLE `category`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
	--
	-- AUTO_INCREMENT для таблиці `game`
	--
	ALTER TABLE `game`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
	--
	-- AUTO_INCREMENT для таблиці `item`
	--
	ALTER TABLE `item`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
	--
	-- Обмеження зовнішнього ключа збережених таблиць
	--

	--
	-- Обмеження зовнішнього ключа таблиці `category`
	--
	ALTER TABLE `category`
	ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

	--
	-- Обмеження зовнішнього ключа таблиці `item`
	--
	ALTER TABLE `item`
	ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
