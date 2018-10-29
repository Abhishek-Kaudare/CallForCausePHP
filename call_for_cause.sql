-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 07:16 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `call_for_cause`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`) VALUES
(1, 'Education'),
(2, 'Social Justice'),
(3, 'Workspace'),
(4, 'Environment'),
(5, 'Corporate'),
(6, 'Fashion'),
(7, 'Government'),
(8, 'Politics'),
(9, 'Human Rights'),
(10, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `petition_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comment_data` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events_cfc`
--

CREATE TABLE `events_cfc` (
  `event_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `event_title` varchar(50) DEFAULT NULL,
  `venue` varchar(70) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `details` varchar(5000) DEFAULT NULL,
  `total_registered` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_cfc`
--

INSERT INTO `events_cfc` (`event_id`, `usr_id`, `event_title`, `venue`, `date_time`, `date`, `details`, `total_registered`) VALUES
(1, 3, '!st Event', 'azad maidan', '2018-10-23 21:24:01', '2018-10-31', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius dictum pretium. In volutpat pellentesque velit a viverra. Mauris mollis justo mattis justo ultricies consectetur. Maecenas quam sem, porta a dignissim vel, sollicitudin in tortor. Quisque hendrerit a odio sit amet dapibus. Vivamus nec dolor in sapien consectetur porta. Integer posuere felis ut lacus interdum viverra.\r\n\r\nProin at vehicula mi. Suspendisse fermentum nibh in urna pellentesque lacinia id sit amet enim. Sed luctus consequat turpis quis dignissim. Maecenas et molestie libero, scelerisque sagittis ligula. Maecenas ac mi pharetra, semper nisi et, ultricies mi. Etiam ac tortor aliquet, vehicula nibh vitae, bibendum nibh. Sed eu nisi risus. Aenean pharetra et nibh id tristique. Morbi ultricies velit vel massa venenatis, et molestie nibh tincidunt. Quisque eleifend aliquet sem vel malesuada. Nullam venenatis elit quam, in sagittis arcu lobortis et. Maecenas egestas felis dui, at condimentum lacus interdum vel. Vestibulum sodales luctus elit, ac blandit massa sodales quis. Etiam blandit tellus faucibus ipsum pretium rutrum.\r\n\r\nAliquam varius purus et erat auctor, at vehicula ex viverra. Nam in nunc eget nibh ultrices mattis in quis ligula. Vestibulum dapibus mauris nec nisl tempus mollis. In hac habitasse platea dictumst. Donec dictum at urna eu tempus. Morbi ornare non diam molestie egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris gravida tempor ligula, in aliquet velit. In tincidunt augue eget justo vulputate, sit amet faucibus tortor aliquam. Quisque interdum congue urna, laoreet scelerisque mi sollicitudin et. Integer consequat lobortis egestas. Nam tempor ex velit, sit amet auctor enim pulvinar sed.\r\n\r\nQuisque et purus nec ligula imperdiet feugiat vitae vel justo. Fusce bibendum lacus sed elementum porta. Vestibulum tristique tellus ac semper aliquet. Phasellus dignissim massa nec erat maximus lobortis. Cras semper et elit quis auctor. Integer blandit, libero non posuere fringilla, risus arcu finibus mauris, non vulputate tellus nisl quis dolor. Nunc eget magna non dui porttitor viverra efficitur non elit. Sed dui tortor, viverra ut ultrices a, vehicula eu felis. Morbi porta nulla sit amet ipsum maximus facilisis. Cras lacus odio, interdum eu egestas sit amet, blandit sed elit. Nulla urna nulla, scelerisque tempus pretium ac, consectetur vel ante.\r\n\r\nVestibulum feugiat metus id tincidunt viverra. Donec tempor orci ac fermentum rhoncus. In accumsan metus turpis, quis fringilla nisi congue eu. Vivamus est eros, tempus sit amet nunc quis, pulvinar egestas nunc. Sed libero turpis, finibus cursus tellus sed, condimentum sodales enim. Integer vel urna ac metus porta consectetur. Mauris accumsan justo leo, a feugiat turpis ultricies ut. Phasellus tempor lectus in magna convallis, sit amet luctus metus sollicitudin. Ut sollicitudin sagittis pretium. Pellentesque leo odio, maximus quis lobortis in, pulvinar id odio. Aenean aliquam massa ut mauris auctor, ac ornare eros facilisis. Fusce sit amet sem nec neque pulvinar accumsan eget id enim. Donec sit amet augue est. Suspendisse dignissim eleifend dui gravida volutpat.', 0),
(2, 3, 'Hurrah', 'Gateway of india', '2018-10-23 19:38:15', '2018-10-26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at lacus posuere, porta nibh sed, gravida dolor. Donec sed congue mauris, et consectetur erat. Donec vitae magna sed arcu feugiat ullamcorper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis vehicula faucibus diam lacinia pulvinar. Etiam vulputate odio sed eros sodales, ut volutpat ante feugiat. Integer consectetur leo non venenatis placerat. Praesent a orci maximus, mollis ligula ac, sagittis neque. Maecenas quis mauris non turpis iaculis gravida. Nulla lacus ipsum, dignissim non tristique eu, sollicitudin non neque.\r\n\r\nNulla facilisi. Sed lectus odio, aliquam in convallis nec, rhoncus eget nibh. Praesent ultricies auctor dignissim. Nulla vel porttitor risus. Nam egestas pellentesque ligula quis ultricies. In fringilla, sem sit amet lobortis vulputate, nisl libero dignissim felis, in dapibus velit enim eget mi. Donec vel purus ut augue efficitur malesuada a eu ipsum. Mauris ac eleifend erat. Mauris semper, tellus ut molestie placerat, velit augue hendrerit erat, in consequat dolor nisi nec justo. Pellentesque sollicitudin felis vel urna auctor tristique. Aliquam tincidunt at est vitae tempus. Etiam pellentesque ultrices elit dapibus semper. Morbi porttitor aliquet elit. Nunc aliquam nulla ac magna mattis suscipit. Quisque lobortis cursus ante sed viverra. Mauris imperdiet dolor magna, et efficitur tellus porta eu.\r\n\r\nInteger arcu elit, tempor sit amet tincidunt nec, pulvinar nec odio. Etiam porta vulputate facilisis. Aliquam vel neque id massa sollicitudin venenatis. Morbi nec sapien in purus fringilla fermentum a a ligula. Aliquam et posuere velit. Quisque gravida ligula ut ante faucibus, non porttitor mauris iaculis. Nunc eget blandit felis. Donec convallis neque sed pretium dictum. Etiam ut semper lectus. Mauris et leo ac est aliquam laoreet id aliquam purus. Maecenas maximus elementum felis, non varius est gravida sed.\r\n\r\nNullam in elit id nisl vehicula pharetra tempus ac urna. Donec efficitur sem odio, non tincidunt ligula aliquam nec. Phasellus euismod congue auctor. Nam suscipit, arcu nec bibendum consectetur, tellus nisi fringilla lorem, sit amet mattis turpis justo at massa. Vestibulum felis nibh, facilisis vitae sem sit amet, mollis placerat neque. Proin quis maximus massa. Donec semper sem a ipsum vestibulum, in auctor tellus vulputate. Etiam eget risus eu eros volutpat ultricies non at mi. Aenean vitae sem nisi. Aliquam iaculis semper justo hendrerit sollicitudin. Etiam fermentum felis ac tristique viverra. Vivamus congue nibh eget porta sollicitudin. Sed suscipit sagittis ultrices.\r\n\r\nNam neque purus, eleifend sit amet lobortis a, molestie nec nulla. Suspendisse varius pharetra metus, bibendum maximus magna pharetra at. Mauris orci dolor, euismod eget tempor vel, bibendum quis mauris. Nulla at justo in sem tempor hendrerit. Mauris vitae metus pharetra ex mollis dignissim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc ullamcorper blandit diam, eu ultricies quam maximus ut. Suspendisse non lacus velit. Cras id magna a dolor condimentum rhoncus sit amet id arcu. Vestibulum ultricies sagittis imperdiet. Nam ultricies eros ac dolor vulputate varius. Pellentesque efficitur id magna non consequat. Donec pharetra neque nec sem luctus lacinia. Vivamus convallis metus eget rutrum eleifend. Donec ipsum nisi, suscipit ac quam ac, condimentum lobortis nunc. Mauris magna libero, varius vel commodo at, hendrerit consectetur ex.', 0),
(3, 5, 'Hurrah', 'azad maidan', '2018-10-24 04:49:12', '2018-10-27', 'asdsdsd\r\nsadsad\r\nsdasa\r\n\r\nds', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `n_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petitions`
--

CREATE TABLE `petitions` (
  `petition_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `date_time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `target_authority` varchar(400) NOT NULL,
  `target_date` date DEFAULT NULL,
  `target_votes` int(11) DEFAULT '0',
  `total_votes` int(11) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `images` varchar(1000) DEFAULT NULL,
  `youtube_url` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petitions`
--

INSERT INTO `petitions` (`petition_id`, `usr_id`, `title`, `date_time_created`, `target_authority`, `target_date`, `target_votes`, `total_votes`, `description`, `category_id`, `images`, `youtube_url`) VALUES
(3, 3, 'Heatmaps', '2018-10-22 20:05:54', 'sadsad', '2018-10-11', 123213, 0, 'sdsACZzxczc', 3, NULL, 'https://www.youtube.com/watch?v=4J4yyNDNIWg'),
(4, 3, 'Self-Certification', '2018-10-22 20:05:56', 'fsdf', '2018-10-31', 566666, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius dictum pretium. In volutpat pellentesque velit a viverra. Mauris mollis justo mattis justo ultricies consectetur. Maecenas quam sem, porta a dignissim vel, sollicitudin in tortor. Quisque hendrerit a odio sit amet dapibus. Vivamus nec dolor in sapien consectetur porta. Integer posuere felis ut lacus interdum viverra.\r\n\r\nProin at vehicula mi. Suspendisse fermentum nibh in urna pellentesque lacinia id sit amet enim. Sed luctus consequat turpis quis dignissim. Maecenas et molestie libero, scelerisque sagittis ligula. Maecenas ac mi pharetra, semper nisi et, ultricies mi. Etiam ac tortor aliquet, vehicula nibh vitae, bibendum nibh. Sed eu nisi risus. Aenean pharetra et nibh id tristique. Morbi ultricies velit vel massa venenatis, et molestie nibh tincidunt. Quisque eleifend aliquet sem vel malesuada. Nullam venenatis elit quam, in sagittis arcu lobortis et. Maecenas egestas felis dui, at condimentum lacus interdum vel. Vestibulum sodales luctus elit, ac blandit massa sodales quis. Etiam blandit tellus faucibus ipsum pretium rutrum.\r\n\r\nAliquam varius purus et erat auctor, at vehicula ex viverra. Nam in nunc eget nibh ultrices mattis in quis ligula. Vestibulum dapibus mauris nec nisl tempus mollis. In hac habitasse platea dictumst. Donec dictum at urna eu tempus. Morbi ornare non diam molestie egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris gravida tempor ligula, in aliquet velit. In tincidunt augue eget justo vulputate, sit amet faucibus tortor aliquam. Quisque interdum congue urna, laoreet scelerisque mi sollicitudin et. Integer consequat lobortis egestas. Nam tempor ex velit, sit amet auctor enim pulvinar sed.\r\n\r\nQuisque et purus nec ligula imperdiet feugiat vitae vel justo. Fusce bibendum lacus sed elementum porta. Vestibulum tristique tellus ac semper aliquet. Phasellus dignissim massa nec erat maximus lobortis. Cras semper et elit quis auctor. Integer blandit, libero non posuere fringilla, risus arcu finibus mauris, non vulputate tellus nisl quis dolor. Nunc eget magna non dui porttitor viverra efficitur non elit. Sed dui tortor, viverra ut ultrices a, vehicula eu felis. Morbi porta nulla sit amet ipsum maximus facilisis. Cras lacus odio, interdum eu egestas sit amet, blandit sed elit. Nulla urna nulla, scelerisque tempus pretium ac, consectetur vel ante.\r\n\r\nVestibulum feugiat metus id tincidunt viverra. Donec tempor orci ac fermentum rhoncus. In accumsan metus turpis, quis fringilla nisi congue eu. Vivamus est eros, tempus sit amet nunc quis, pulvinar egestas nunc. Sed libero turpis, finibus cursus tellus sed, condimentum sodales enim. Integer vel urna ac metus porta consectetur. Mauris accumsan justo leo, a feugiat turpis ultricies ut. Phasellus tempor lectus in magna convallis, sit amet luctus metus sollicitudin. Ut sollicitudin sagittis pretium. Pellentesque leo odio, maximus quis lobortis in, pulvinar id odio. Aenean aliquam massa ut mauris auctor, ac ornare eros facilisis. Fusce sit amet sem nec neque pulvinar accumsan eget id enim. Donec sit amet augue est. Suspendisse dignissim eleifend dui gravida volutpat.', 4, NULL, 'https://www.youtube.com/watch?v=4J4yyNDNIWg'),
(5, 3, 'Heatmaps1', '2018-10-22 20:05:59', 'fsdf', '2019-01-10', 2147483647, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius dictum pretium. In volutpat pellentesque velit a viverra. Mauris mollis justo mattis justo ultricies consectetur. Maecenas quam sem, porta a dignissim vel, sollicitudin in tortor. Quisque hendrerit a odio sit amet dapibus. Vivamus nec dolor in sapien consectetur porta. Integer posuere felis ut lacus interdum viverra.\r\n\r\nProin at vehicula mi. Suspendisse fermentum nibh in urna pellentesque lacinia id sit amet enim. Sed luctus consequat turpis quis dignissim. Maecenas et molestie libero, scelerisque sagittis ligula. Maecenas ac mi pharetra, semper nisi et, ultricies mi. Etiam ac tortor aliquet, vehicula nibh vitae, bibendum nibh. Sed eu nisi risus. Aenean pharetra et nibh id tristique. Morbi ultricies velit vel massa venenatis, et molestie nibh tincidunt. Quisque eleifend aliquet sem vel malesuada. Nullam venenatis elit quam, in sagittis arcu lobortis et. Maecenas egestas felis dui, at condimentum lacus interdum vel. Vestibulum sodales luctus elit, ac blandit massa sodales quis. Etiam blandit tellus faucibus ipsum pretium rutrum.\r\n\r\nAliquam varius purus et erat auctor, at vehicula ex viverra. Nam in nunc eget nibh ultrices mattis in quis ligula. Vestibulum dapibus mauris nec nisl tempus mollis. In hac habitasse platea dictumst. Donec dictum at urna eu tempus. Morbi ornare non diam molestie egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris gravida tempor ligula, in aliquet velit. In tincidunt augue eget justo vulputate, sit amet faucibus tortor aliquam. Quisque interdum congue urna, laoreet scelerisque mi sollicitudin et. Integer consequat lobortis egestas. Nam tempor ex velit, sit amet auctor enim pulvinar sed.\r\n\r\nQuisque et purus nec ligula imperdiet feugiat vitae vel justo. Fusce bibendum lacus sed elementum porta. Vestibulum tristique tellus ac semper aliquet. Phasellus dignissim massa nec erat maximus lobortis. Cras semper et elit quis auctor. Integer blandit, libero non posuere fringilla, risus arcu finibus mauris, non vulputate tellus nisl quis dolor. Nunc eget magna non dui porttitor viverra efficitur non elit. Sed dui tortor, viverra ut ultrices a, vehicula eu felis. Morbi porta nulla sit amet ipsum maximus facilisis. Cras lacus odio, interdum eu egestas sit amet, blandit sed elit. Nulla urna nulla, scelerisque tempus pretium ac, consectetur vel ante.\r\n\r\nVestibulum feugiat metus id tincidunt viverra. Donec tempor orci ac fermentum rhoncus. In accumsan metus turpis, quis fringilla nisi congue eu. Vivamus est eros, tempus sit amet nunc quis, pulvinar egestas nunc. Sed libero turpis, finibus cursus tellus sed, condimentum sodales enim. Integer vel urna ac metus porta consectetur. Mauris accumsan justo leo, a feugiat turpis ultricies ut. Phasellus tempor lectus in magna convallis, sit amet luctus metus sollicitudin. Ut sollicitudin sagittis pretium. Pellentesque leo odio, maximus quis lobortis in, pulvinar id odio. Aenean aliquam massa ut mauris auctor, ac ornare eros facilisis. Fusce sit amet sem nec neque pulvinar accumsan eget id enim. Donec sit amet augue est. Suspendisse dignissim eleifend dui gravida volutpat.', 6, NULL, 'https://www.youtube.com/watch?v=4J4yyNDNIWg'),
(6, 3, 'Self-Certification1', '2018-10-22 20:06:01', 'fsdf', '2018-10-04', 1212112, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius dictum pretium. In volutpat pellentesque velit a viverra. Mauris mollis justo mattis justo ultricies consectetur. Maecenas quam sem, porta a dignissim vel, sollicitudin in tortor. Quisque hendrerit a odio sit amet dapibus. Vivamus nec dolor in sapien consectetur porta. Integer posuere felis ut lacus interdum viverra.\r\n\r\nProin at vehicula mi. Suspendisse fermentum nibh in urna pellentesque lacinia id sit amet enim. Sed luctus consequat turpis quis dignissim. Maecenas et molestie libero, scelerisque sagittis ligula. Maecenas ac mi pharetra, semper nisi et, ultricies mi. Etiam ac tortor aliquet, vehicula nibh vitae, bibendum nibh. Sed eu nisi risus. Aenean pharetra et nibh id tristique. Morbi ultricies velit vel massa venenatis, et molestie nibh tincidunt. Quisque eleifend aliquet sem vel malesuada. Nullam venenatis elit quam, in sagittis arcu lobortis et. Maecenas egestas felis dui, at condimentum lacus interdum vel. Vestibulum sodales luctus elit, ac blandit massa sodales quis. Etiam blandit tellus faucibus ipsum pretium rutrum.\r\n\r\nAliquam varius purus et erat auctor, at vehicula ex viverra. Nam in nunc eget nibh ultrices mattis in quis ligula. Vestibulum dapibus mauris nec nisl tempus mollis. In hac habitasse platea dictumst. Donec dictum at urna eu tempus. Morbi ornare non diam molestie egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris gravida tempor ligula, in aliquet velit. In tincidunt augue eget justo vulputate, sit amet faucibus tortor aliquam. Quisque interdum congue urna, laoreet scelerisque mi sollicitudin et. Integer consequat lobortis egestas. Nam tempor ex velit, sit amet auctor enim pulvinar sed.\r\n\r\nQuisque et purus nec ligula imperdiet feugiat vitae vel justo. Fusce bibendum lacus sed elementum porta. Vestibulum tristique tellus ac semper aliquet. Phasellus dignissim massa nec erat maximus lobortis. Cras semper et elit quis auctor. Integer blandit, libero non posuere fringilla, risus arcu finibus mauris, non vulputate tellus nisl quis dolor. Nunc eget magna non dui porttitor viverra efficitur non elit. Sed dui tortor, viverra ut ultrices a, vehicula eu felis. Morbi porta nulla sit amet ipsum maximus facilisis. Cras lacus odio, interdum eu egestas sit amet, blandit sed elit. Nulla urna nulla, scelerisque tempus pretium ac, consectetur vel ante.\r\n\r\nVestibulum feugiat metus id tincidunt viverra. Donec tempor orci ac fermentum rhoncus. In accumsan metus turpis, quis fringilla nisi congue eu. Vivamus est eros, tempus sit amet nunc quis, pulvinar egestas nunc. Sed libero turpis, finibus cursus tellus sed, condimentum sodales enim. Integer vel urna ac metus porta consectetur. Mauris accumsan justo leo, a feugiat turpis ultricies ut. Phasellus tempor lectus in magna convallis, sit amet luctus metus sollicitudin. Ut sollicitudin sagittis pretium. Pellentesque leo odio, maximus quis lobortis in, pulvinar id odio. Aenean aliquam massa ut mauris auctor, ac ornare eros facilisis. Fusce sit amet sem nec neque pulvinar accumsan eget id enim. Donec sit amet augue est. Suspendisse dignissim eleifend dui gravida volutpat.', 10, NULL, 'https://www.youtube.com/watch?v=4J4yyNDNIWg'),
(7, 3, 'Self-Certification1', '2018-10-22 20:06:03', 'fsdf', '2018-10-04', 1212112, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius dictum pretium. In volutpat pellentesque velit a viverra. Mauris mollis justo mattis justo ultricies consectetur. Maecenas quam sem, porta a dignissim vel, sollicitudin in tortor. Quisque hendrerit a odio sit amet dapibus. Vivamus nec dolor in sapien consectetur porta. Integer posuere felis ut lacus interdum viverra.\r\n\r\nProin at vehicula mi. Suspendisse fermentum nibh in urna pellentesque lacinia id sit amet enim. Sed luctus consequat turpis quis dignissim. Maecenas et molestie libero, scelerisque sagittis ligula. Maecenas ac mi pharetra, semper nisi et, ultricies mi. Etiam ac tortor aliquet, vehicula nibh vitae, bibendum nibh. Sed eu nisi risus. Aenean pharetra et nibh id tristique. Morbi ultricies velit vel massa venenatis, et molestie nibh tincidunt. Quisque eleifend aliquet sem vel malesuada. Nullam venenatis elit quam, in sagittis arcu lobortis et. Maecenas egestas felis dui, at condimentum lacus interdum vel. Vestibulum sodales luctus elit, ac blandit massa sodales quis. Etiam blandit tellus faucibus ipsum pretium rutrum.\r\n\r\nAliquam varius purus et erat auctor, at vehicula ex viverra. Nam in nunc eget nibh ultrices mattis in quis ligula. Vestibulum dapibus mauris nec nisl tempus mollis. In hac habitasse platea dictumst. Donec dictum at urna eu tempus. Morbi ornare non diam molestie egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris gravida tempor ligula, in aliquet velit. In tincidunt augue eget justo vulputate, sit amet faucibus tortor aliquam. Quisque interdum congue urna, laoreet scelerisque mi sollicitudin et. Integer consequat lobortis egestas. Nam tempor ex velit, sit amet auctor enim pulvinar sed.\r\n\r\nQuisque et purus nec ligula imperdiet feugiat vitae vel justo. Fusce bibendum lacus sed elementum porta. Vestibulum tristique tellus ac semper aliquet. Phasellus dignissim massa nec erat maximus lobortis. Cras semper et elit quis auctor. Integer blandit, libero non posuere fringilla, risus arcu finibus mauris, non vulputate tellus nisl quis dolor. Nunc eget magna non dui porttitor viverra efficitur non elit. Sed dui tortor, viverra ut ultrices a, vehicula eu felis. Morbi porta nulla sit amet ipsum maximus facilisis. Cras lacus odio, interdum eu egestas sit amet, blandit sed elit. Nulla urna nulla, scelerisque tempus pretium ac, consectetur vel ante.\r\n\r\nVestibulum feugiat metus id tincidunt viverra. Donec tempor orci ac fermentum rhoncus. In accumsan metus turpis, quis fringilla nisi congue eu. Vivamus est eros, tempus sit amet nunc quis, pulvinar egestas nunc. Sed libero turpis, finibus cursus tellus sed, condimentum sodales enim. Integer vel urna ac metus porta consectetur. Mauris accumsan justo leo, a feugiat turpis ultricies ut. Phasellus tempor lectus in magna convallis, sit amet luctus metus sollicitudin. Ut sollicitudin sagittis pretium. Pellentesque leo odio, maximus quis lobortis in, pulvinar id odio. Aenean aliquam massa ut mauris auctor, ac ornare eros facilisis. Fusce sit amet sem nec neque pulvinar accumsan eget id enim. Donec sit amet augue est. Suspendisse dignissim eleifend dui gravida volutpat.', 10, NULL, 'https://www.youtube.com/watch?v=4J4yyNDNIWg'),
(8, 3, 'Self-Certification1', '2018-10-22 20:06:05', 'fsdf', '2018-10-04', 1212112, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius dictum pretium. In volutpat pellentesque velit a viverra. Mauris mollis justo mattis justo ultricies consectetur. Maecenas quam sem, porta a dignissim vel, sollicitudin in tortor. Quisque hendrerit a odio sit amet dapibus. Vivamus nec dolor in sapien consectetur porta. Integer posuere felis ut lacus interdum viverra.\r\n\r\nProin at vehicula mi. Suspendisse fermentum nibh in urna pellentesque lacinia id sit amet enim. Sed luctus consequat turpis quis dignissim. Maecenas et molestie libero, scelerisque sagittis ligula. Maecenas ac mi pharetra, semper nisi et, ultricies mi. Etiam ac tortor aliquet, vehicula nibh vitae, bibendum nibh. Sed eu nisi risus. Aenean pharetra et nibh id tristique. Morbi ultricies velit vel massa venenatis, et molestie nibh tincidunt. Quisque eleifend aliquet sem vel malesuada. Nullam venenatis elit quam, in sagittis arcu lobortis et. Maecenas egestas felis dui, at condimentum lacus interdum vel. Vestibulum sodales luctus elit, ac blandit massa sodales quis. Etiam blandit tellus faucibus ipsum pretium rutrum.\r\n\r\nAliquam varius purus et erat auctor, at vehicula ex viverra. Nam in nunc eget nibh ultrices mattis in quis ligula. Vestibulum dapibus mauris nec nisl tempus mollis. In hac habitasse platea dictumst. Donec dictum at urna eu tempus. Morbi ornare non diam molestie egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris gravida tempor ligula, in aliquet velit. In tincidunt augue eget justo vulputate, sit amet faucibus tortor aliquam. Quisque interdum congue urna, laoreet scelerisque mi sollicitudin et. Integer consequat lobortis egestas. Nam tempor ex velit, sit amet auctor enim pulvinar sed.\r\n\r\nQuisque et purus nec ligula imperdiet feugiat vitae vel justo. Fusce bibendum lacus sed elementum porta. Vestibulum tristique tellus ac semper aliquet. Phasellus dignissim massa nec erat maximus lobortis. Cras semper et elit quis auctor. Integer blandit, libero non posuere fringilla, risus arcu finibus mauris, non vulputate tellus nisl quis dolor. Nunc eget magna non dui porttitor viverra efficitur non elit. Sed dui tortor, viverra ut ultrices a, vehicula eu felis. Morbi porta nulla sit amet ipsum maximus facilisis. Cras lacus odio, interdum eu egestas sit amet, blandit sed elit. Nulla urna nulla, scelerisque tempus pretium ac, consectetur vel ante.\r\n\r\nVestibulum feugiat metus id tincidunt viverra. Donec tempor orci ac fermentum rhoncus. In accumsan metus turpis, quis fringilla nisi congue eu. Vivamus est eros, tempus sit amet nunc quis, pulvinar egestas nunc. Sed libero turpis, finibus cursus tellus sed, condimentum sodales enim. Integer vel urna ac metus porta consectetur. Mauris accumsan justo leo, a feugiat turpis ultricies ut. Phasellus tempor lectus in magna convallis, sit amet luctus metus sollicitudin. Ut sollicitudin sagittis pretium. Pellentesque leo odio, maximus quis lobortis in, pulvinar id odio. Aenean aliquam massa ut mauris auctor, ac ornare eros facilisis. Fusce sit amet sem nec neque pulvinar accumsan eget id enim. Donec sit amet augue est. Suspendisse dignissim eleifend dui gravida volutpat.', 10, NULL, 'https://www.youtube.com/watch?v=4J4yyNDNIWg'),
(9, 3, 'Self-Certification1', '2018-10-22 20:06:08', 'fsdf', '2018-10-04', 1212112, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius dictum pretium. In volutpat pellentesque velit a viverra. Mauris mollis justo mattis justo ultricies consectetur. Maecenas quam sem, porta a dignissim vel, sollicitudin in tortor. Quisque hendrerit a odio sit amet dapibus. Vivamus nec dolor in sapien consectetur porta. Integer posuere felis ut lacus interdum viverra.\r\n\r\nProin at vehicula mi. Suspendisse fermentum nibh in urna pellentesque lacinia id sit amet enim. Sed luctus consequat turpis quis dignissim. Maecenas et molestie libero, scelerisque sagittis ligula. Maecenas ac mi pharetra, semper nisi et, ultricies mi. Etiam ac tortor aliquet, vehicula nibh vitae, bibendum nibh. Sed eu nisi risus. Aenean pharetra et nibh id tristique. Morbi ultricies velit vel massa venenatis, et molestie nibh tincidunt. Quisque eleifend aliquet sem vel malesuada. Nullam venenatis elit quam, in sagittis arcu lobortis et. Maecenas egestas felis dui, at condimentum lacus interdum vel. Vestibulum sodales luctus elit, ac blandit massa sodales quis. Etiam blandit tellus faucibus ipsum pretium rutrum.\r\n\r\nAliquam varius purus et erat auctor, at vehicula ex viverra. Nam in nunc eget nibh ultrices mattis in quis ligula. Vestibulum dapibus mauris nec nisl tempus mollis. In hac habitasse platea dictumst. Donec dictum at urna eu tempus. Morbi ornare non diam molestie egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris gravida tempor ligula, in aliquet velit. In tincidunt augue eget justo vulputate, sit amet faucibus tortor aliquam. Quisque interdum congue urna, laoreet scelerisque mi sollicitudin et. Integer consequat lobortis egestas. Nam tempor ex velit, sit amet auctor enim pulvinar sed.\r\n\r\nQuisque et purus nec ligula imperdiet feugiat vitae vel justo. Fusce bibendum lacus sed elementum porta. Vestibulum tristique tellus ac semper aliquet. Phasellus dignissim massa nec erat maximus lobortis. Cras semper et elit quis auctor. Integer blandit, libero non posuere fringilla, risus arcu finibus mauris, non vulputate tellus nisl quis dolor. Nunc eget magna non dui porttitor viverra efficitur non elit. Sed dui tortor, viverra ut ultrices a, vehicula eu felis. Morbi porta nulla sit amet ipsum maximus facilisis. Cras lacus odio, interdum eu egestas sit amet, blandit sed elit. Nulla urna nulla, scelerisque tempus pretium ac, consectetur vel ante.\r\n\r\nVestibulum feugiat metus id tincidunt viverra. Donec tempor orci ac fermentum rhoncus. In accumsan metus turpis, quis fringilla nisi congue eu. Vivamus est eros, tempus sit amet nunc quis, pulvinar egestas nunc. Sed libero turpis, finibus cursus tellus sed, condimentum sodales enim. Integer vel urna ac metus porta consectetur. Mauris accumsan justo leo, a feugiat turpis ultricies ut. Phasellus tempor lectus in magna convallis, sit amet luctus metus sollicitudin. Ut sollicitudin sagittis pretium. Pellentesque leo odio, maximus quis lobortis in, pulvinar id odio. Aenean aliquam massa ut mauris auctor, ac ornare eros facilisis. Fusce sit amet sem nec neque pulvinar accumsan eget id enim. Donec sit amet augue est. Suspendisse dignissim eleifend dui gravida volutpat.', 10, NULL, 'https://www.youtube.com/watch?v=4J4yyNDNIWg'),
(10, 3, 'Self-Certification222', '2018-10-23 13:34:08', 'fsdf', '2018-10-12', 3333, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eleifend non sapien vitae lobortis. Praesent commodo luctus nunc at hendrerit. Nulla facilisi. Aenean posuere accumsan nulla, et feugiat metus efficitur eu. Proin sodales imperdiet risus ut pretium. Curabitur in viverra erat. Curabitur et scelerisque ligula. Nunc a laoreet lorem. Donec tincidunt aliquet nisi at tempor. Ut ut odio justo. Proin interdum arcu vel porta euismod.\r\n\r\nUt vitae tristique enim. Proin porta est mauris, eget blandit metus ultricies rhoncus. Cras cursus ligula sit amet tortor congue eleifend. Pellentesque nulla dolor, feugiat at sapien eu, auctor consequat odio. Suspendisse non vulputate ante, eu semper tortor. Nunc posuere commodo nisl. Proin consequat, nibh ut placerat laoreet, orci purus molestie eros, sit amet molestie massa enim vel sapien. Praesent orci urna, pharetra in maximus in, ornare eu velit. Aliquam aliquet risus iaculis aliquet vestibulum. Nam sit amet nisi orci. Nulla vitae pulvinar velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nMorbi aliquam lectus vel auctor tincidunt. In et commodo ipsum. Quisque pellentesque non sem ac dictum. Nullam quis sapien ligula. Aliquam erat volutpat. In iaculis, massa ac ultricies lobortis, tellus ligula sagittis magna, ut accumsan ligula nibh quis purus. Sed non nisi nisi.\r\n\r\nAliquam non velit ut sapien facilisis posuere a sed massa. Sed euismod enim mauris, sit amet vulputate enim sagittis in. Aliquam erat volutpat. In rutrum eu tortor et hendrerit. Integer efficitur accumsan augue, eget posuere augue tristique eu. Pellentesque lobortis volutpat ante, a suscipit orci feugiat accumsan. Praesent consequat, mauris sed suscipit lacinia, ex leo auctor libero, non pretium augue leo ac lectus. Cras efficitur justo sed commodo porttitor. Ut ultrices a augue nec placerat. Donec nec blandit mauris, et malesuada tellus. Nullam sed pellentesque magna. Praesent eleifend ipsum id neque suscipit, sed aliquet sem rhoncus. Donec a rhoncus ipsum. Vestibulum suscipit velit in odio laoreet, ut aliquet quam egestas. Quisque euismod leo nisi, ac congue ligula fermentum a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nSed faucibus ultrices mi, eu mattis tellus aliquam et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam pharetra massa lorem, faucibus consequat nisi semper vel. Donec augue massa, dapibus ac porta rutrum, ornare at sem. Fusce hendrerit bibendum vehicula. Aenean auctor risus nec est facilisis, quis ullamcorper eros ullamcorper. Pellentesque faucibus ipsum viverra orci mollis aliquet. Pellentesque pretium turpis justo, eget viverra ipsum consequat ac. Sed non justo eget nisl tempor dictum sed sit amet nibh. Suspendisse fringilla laoreet urna at pharetra. Integer at lectus dolor. Vivamus vehicula felis vel dictum commodo. Pellentesque fermentum aliquam turpis vel fermentum.', 5, NULL, 'https://www.youtube.com/watch?v=4J4yyNDNIWg'),
(11, 3, 'Self-Certificationr44334243244', '2018-10-23 19:22:58', 'fsdf', '2018-10-19', 2333333, NULL, 'fcsdFdsdsf\r\n\r\nsddf\r\nds\r\nfsd\r\nf\r\n\r\nf\r\nds\r\nfds\r\nf\r\nsd\r\nf\r\nds\r\nfds\r\nf\r\nds\r\nf\r\nsd\r\nf\r\nds\r\nfds\r\n\r\nds\r\nds\r\n\r\nfds\r\nfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffsaweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee333333333333333333333', 3, NULL, 'https://www.youtube.com/watch?v=4J4yyNDNIWg'),
(12, 5, 'Heatmaps', '2018-10-24 04:50:47', 'fsdf', '2018-10-31', 4444444, NULL, 'aasssf\r\nhghhhh', 7, NULL, 'https://www.youtube.com/watch?v=9h9EdWopTi0');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `petition_id` int(11) NOT NULL,
  `tag` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `oauth_provider` varchar(40) NOT NULL DEFAULT 'builtIn',
  `oauth_uid` int(11) DEFAULT NULL,
  `name` varchar(400) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(400) DEFAULT NULL COMMENT 'password',
  `picture` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `oauth_provider`, `oauth_uid`, `name`, `email`, `password`, `picture`) VALUES
(3, 'builtIn', 0, 'dummy', 'dummy@dummy.dummy', '$2y$10$zzj.3SAT81aQoCqyzxrL2.8AXpw6HLSP4UUAOlbNCjuU3c.GafFPi', ''),
(4, 'builtIn', 0, 'Abhishek Kaudare', '2016.abhishek.kaudare@ves.ac.in', '$2y$10$zy4WPzvpQdUUaZC6YL4HFelKzPg7TsKKstMQ7nEfNISErX6Xb1uqK', ''),
(5, 'builtIn', 0, 'Dummy1', 'dummy@dummy.dummy1', '$2y$10$VKWpMAAPTV2PtovWvsYZ/.OGCY9mepSYeGANBXMdN8nsVENWAmkma', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_profilw`
--

CREATE TABLE `users_profilw` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `petition_id` int(11) NOT NULL,
  `status` enum('1') NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_attend_user` (`usr_id`),
  ADD KEY `fk_attend_event` (`event_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_comment_user` (`usr_id`);

--
-- Indexes for table `events_cfc`
--
ALTER TABLE `events_cfc`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_user_events` (`usr_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `fk_user_notification` (`user_id`);

--
-- Indexes for table `petitions`
--
ALTER TABLE `petitions`
  ADD PRIMARY KEY (`petition_id`),
  ADD KEY `fk_petition_user` (`usr_id`),
  ADD KEY `fk_petition_category` (`category_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_petition_tag` (`petition_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `users_profilw`
--
ALTER TABLE `users_profilw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_votes_voters` (`usr_id`),
  ADD KEY `fk_votes_petitions` (`petition_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events_cfc`
--
ALTER TABLE `events_cfc`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petitions`
--
ALTER TABLE `petitions`
  MODIFY `petition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_profilw`
--
ALTER TABLE `users_profilw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `fk_attend_event` FOREIGN KEY (`event_id`) REFERENCES `events_cfc` (`event_id`),
  ADD CONSTRAINT `fk_attend_user` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`);

--
-- Constraints for table `events_cfc`
--
ALTER TABLE `events_cfc`
  ADD CONSTRAINT `fk_user_events` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_user_notification` FOREIGN KEY (`user_id`) REFERENCES `users` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `petitions`
--
ALTER TABLE `petitions`
  ADD CONSTRAINT `fk_petition_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `fk_petition_tag` FOREIGN KEY (`petition_id`) REFERENCES `petitions` (`petition_id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `fk_votes_petitions` FOREIGN KEY (`petition_id`) REFERENCES `petitions` (`petition_id`),
  ADD CONSTRAINT `fk_votes_users` FOREIGN KEY (`usr_id`) REFERENCES `users` (`usr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
