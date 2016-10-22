<?php

namespace Drupal\Component\Serialization;

<<<<<<< HEAD
/**
 * Provides a YAML serialization implementation.
 *
 * Proxy implementation that will choose the best library based on availability.
=======
use Drupal\Component\Serialization\Exception\InvalidDataTypeException;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;

/**
 * Default serialization for YAML using the Symfony component.
>>>>>>> github/master
 */
class Yaml implements SerializationInterface {

  /**
<<<<<<< HEAD
   * The YAML implementation to use.
   *
   * @var \Drupal\Component\Serialization\SerializationInterface
   */
  protected static $serializer;

  /**
   * {@inheritdoc}
   */
  public static function encode($data) {
    // Instead of using \Drupal\Component\Serialization\Yaml::getSerializer(),
    // always using Symfony for writing the data, to reduce the risk of having
    // differences if different environments (like production and development)
    // do not match in terms of what YAML implementation is available.
    return YamlSymfony::encode($data);
=======
   * {@inheritdoc}
   */
  public static function encode($data) {
    try {
      $yaml = new Dumper();
      $yaml->setIndentation(2);
      return $yaml->dump($data, PHP_INT_MAX, 0, TRUE, FALSE);
    }
    catch (\Exception $e) {
      throw new InvalidDataTypeException($e->getMessage(), $e->getCode(), $e);
    }
>>>>>>> github/master
  }

  /**
   * {@inheritdoc}
   */
  public static function decode($raw) {
<<<<<<< HEAD
    $serializer = static::getSerializer();
    return $serializer::decode($raw);
=======
    try {
      $yaml = new Parser();
      // Make sure we have a single trailing newline. A very simple config like
      // 'foo: bar' with no newline will fail to parse otherwise.
      return $yaml->parse($raw, TRUE, FALSE);
    }
    catch (\Exception $e) {
      throw new InvalidDataTypeException($e->getMessage(), $e->getCode(), $e);
    }
>>>>>>> github/master
  }

  /**
   * {@inheritdoc}
   */
  public static function getFileExtension() {
    return 'yml';
  }

<<<<<<< HEAD
  /**
   * Determines which implementation to use for parsing YAML.
   */
  protected static function getSerializer() {

    if (!isset(static::$serializer)) {
      // Use the PECL YAML extension if it is available. It has better
      // performance for file reads and is YAML compliant.
      if (extension_loaded('yaml')) {
        static::$serializer = YamlPecl::class;
      }
      else {
        // Otherwise, fallback to the Symfony implementation.
        static::$serializer = YamlSymfony::class;
      }
    }
    return static::$serializer;
  }

=======
>>>>>>> github/master
}
