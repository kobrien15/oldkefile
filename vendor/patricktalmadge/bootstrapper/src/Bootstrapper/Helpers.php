<?php
namespace Bootstrapper;

use Illuminate\Container\Container;

/**
 * Common helper functions used by Bootstrapper.
 *
 * @category   HTML/UI
 * @package    Boostrapper
 * @subpackage Twitter
 * @author     Patrick Talmadge - <ptalmadge@gmail.com>
 * @author     Maxime Fabre - <ehtnam6@gmail.com>
 * @license    MIT License <http://www.opensource.org/licenses/mit>
 * @link       http://laravelbootstrapper.phpfogapp.com/
 *
 * @see        http://twitter.github.com/bootstrap/
 */
class Helpers
{

  protected static $container;

  //////////////////////////////////////////////////////////////////
  //////////////////////////// IOC CONTAINER ///////////////////////
  //////////////////////////////////////////////////////////////////

  /**
   * Bind a Container to Bootstrapper
   *
   * @param Container $container
   */
  public static function setContainer(Container $container)
  {
    static::$container = $container;
  }

  /**
   * Get the Container from Bootstrapper
   *
   * @param string $make A dependency to make on the fly
   *
   * @return Container
   */
  public static function getContainer($make = null)
  {
    if ($make) {
      return static::$container->make($make);
    }

    return static::$container;
  }

  /**
   * Function adds the given value to an array. If the key already
   * exists the value is concatenated to the end of the string.
   * Mainly used for adding classes.
   *
   * @param array  $array Array object to be added to
   * @param string $value String value
   * @param string $key   Array key to use
   *
   * @return array
   */
  public static function add_class($array, $value, $key = 'class')
  {
    $array[$key] = isset($array[$key]) ? $array[$key].' '.$value : $value;

    return $array;
  }

  /**
   * Function to create a random string of a differing length used for creating IDs
   *
   * @param int $length Length of the random string
   *
   * @return string
   */
  public static function rand_string($length)
  {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    $size = strlen($chars);
    $str = '';
    for ($i = 0; $i < $length; $i++) {
      $str .= $chars[ rand(0, $size - 1) ];
    }

    return $str;
  }

  /**
   * Function used to prime the attributes array for dynamic calls.
   *
   * @param string $exclude      String to exclude from array
   * @param array  $class_array  Class array
   * @param array  $params       Parameters array
   * @param int    $index        Index of the parameters array to use
   * @param string $extra        Prefix to the class
   * @param string $extra_unless Value to exclude the prefix from
   *
   * @return array
   */
  public static function set_multi_class_attributes($exclude, $class_array, $params, $index, $extra = '', $extra_unless = null)
  {
    // Make sure the class attribute exists
    if (!isset($params[$index])) $params[$index] = array();
    if (!isset($params[$index]['class'])) $params[$index]['class'] = '';

    foreach ($class_array as $s) {
      if ($s != $exclude) {
        $class = ' '.$extra.$s;
        if (isset($extra_unless) && strpos($s, $extra_unless) !== false) {
          $class = ' '.$s;
        }

        $params[$index]['class'] .= $class;
      }
    }

    $params[$index]['class'] = trim($params[$index]['class']);

    return $params;
  }

  /**
   * Returns true if any of the given classes are in these attributes
   * @param array attributes The attributes
   * @param array classes The classes to search for
   *
   * @return boolean
   */
  public static function has_class($attributes, $classes) {
    // Make sure the class attribute exists
    if (!isset($attributes)) $attributes = array();
    if (!isset($attributes['class'])) $attributes['class'] = '';

    foreach ($classes as $class) {
      if (strpos($attributes['class'], $class) === true) {
        return true;
      }
    }

    return false;

  }

}
