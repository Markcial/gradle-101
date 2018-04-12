import hello.*;

class Application {
  static void main(String[] args) {
    System.out.println("Hello from java");

    (new ClojureWorld()).hello();
    (new KotlinWorld()).hello();
    (new GroovyWorld()).hello();
    (new ScalaWorld()).hello();
  }
}