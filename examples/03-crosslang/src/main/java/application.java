import hello.*;

class Application {
  public static void main(String[] args) {
    System.out.println("Hello from java");

    (new ClojureWorld()).hello();
    (new GroovyWorld()).hello();
    (new KotlinWorld()).hello();
    (new ScalaWorld()).hello();
  }
}
